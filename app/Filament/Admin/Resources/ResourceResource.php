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

    protected static ?string $navigationGroup = 'Administration';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->options([
                                        'article' => 'Article',
                                        'helpline' => 'Helpline',
                                        'support_group' => 'Support Group',
                                    ])
                                    ->required()
                                    ->label('Type')
                                    ->reactive()
                                    ->afterStateUpdated(fn (callable $set) => $set('title', null)),
    
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
                                    ->unique('resources', 'slug', fn($record) => $record)
                                    ->label('Slug'),
                            ]),
    
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->label('Description'),
                    ]),
    
                Forms\Components\Section::make('Media & Files')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->image()
                                    ->maxSize(5120)
                                    ->directory('resource-images')
                                    ->label('Resource Image'),
    
                                Forms\Components\FileUpload::make('file_path')
                                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                    ->directory('resource-files')
                                    ->preserveFilenames()
                                    ->label('Resource File')
                                    ->visible(fn (callable $get) => $get('type') === 'article'),
                            ]),
                    ]),
    
                Forms\Components\Section::make('Additional Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('external_link')
                                    ->url()
                                    ->label('External Link')
                                    ->visible(fn (callable $get) => $get('type') === 'article'),
    
                                Forms\Components\TextInput::make('contact_number')
                                    ->tel()
                                    ->label('Contact Number')
                                    ->visible(fn (callable $get) => $get('type') === 'helpline'),
    
                                Forms\Components\TextInput::make('support_group_link')
                                    ->url()
                                    ->label('Support Group Link')
                                    ->visible(fn (callable $get) => $get('type') === 'support_group'),
    
                                Forms\Components\TextInput::make('availability')
                                    ->label('Availability')
                                    ->visible(fn (callable $get) => in_array($get('type'), ['helpline', 'support_group'])),
                            ]),
                    ]),
    
                Forms\Components\Section::make('Publishing Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Published Date'),
    
                                Forms\Components\TextInput::make('relevance_score')
                                    ->label('Relevance Score')
                                    ->numeric()
                                    ->step(1)
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),
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
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->circular(),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('Download')
                    ->formatStateUsing(function ($record) {
                        if (!$record->file_path) {
                            return '';
                        }
                        $fileName = basename($record->file_path);
                        $url = asset('storage/' . $record->file_path);
                        return "<a href='{$url}' target='_blank' class='inline-flex items-center'>
                    <x-heroicon-o-download class='w-4 h-4 mr-1'/>
                    {$fileName}
                </a>";
                    })
                    ->html()
                    ->visible(fn($record) => !empty ($record->file_path)),
                Tables\Columns\TextColumn::make('external_link')
                    ->label('External Link')
                    ->url(fn($record) => $record->external_link)
                    ->openUrlInNewTab()
                    ->visible(fn($record) => !empty ($record->external_link)),

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
