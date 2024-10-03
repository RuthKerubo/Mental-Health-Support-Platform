<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResourceResource\Pages;
use App\Filament\Admin\Resources\ResourceResource\RelationManagers;
use App\Models\Resource as ResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;

    // Changed the navigation icon to 'heroicon-o-book-open' (suggestive of resources)
    protected static ?string $navigationIcon = 'heroicon-o-book-open'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category'),
                
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Title'),
                
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique('resources', 'slug', fn ($record) => $record)
                    ->label('Slug'),
                
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Description'),
                
                Forms\Components\Select::make('type')
                    ->options([
                        'article' => 'Article',
                        'helpline' => 'Helpline',
                        'support_group' => 'Support Group',
                    ])
                    ->required()
                    ->label('Type'),
                
                Forms\Components\DatePicker::make('published_at')
                    ->label('Published Date'),
                
                Forms\Components\TextInput::make('relevance_score')
                    ->label('Relevance Score')
                    ->numeric()
                    ->step(1)  // Specifies that the input will increment by 1
                    ->minValue(0)  
                    ->maxValue(100)  
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('relevance_score')
                    ->label('Relevance Score')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
