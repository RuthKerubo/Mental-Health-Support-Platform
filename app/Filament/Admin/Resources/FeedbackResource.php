<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FeedbackResource\Pages;
use App\Filament\Admin\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Basic Information')
                            ->schema([
                                Forms\Components\Select::make('resource_id')
                                    ->relationship('resource', 'title')
                                    ->required()
                                    ->searchable(),

                                Forms\Components\Toggle::make('is_anonymous')
                                    ->default(true)
                                    ->reactive(),

                                Forms\Components\TextInput::make('contact_email')
                                    ->email()
                                    ->hidden(fn (callable $get) => $get('is_anonymous')),
                            ]),

                        Forms\Components\Section::make('Feedback Details')
                            ->schema([
                                Forms\Components\Select::make('rating')
                                ->label('How would you rate this resource?')
                                ->options([
                                    1 => '⭐ Poor',
                                    2 => '⭐⭐ Fair',
                                    3 => '⭐⭐⭐ Good',
                                    4 => '⭐⭐⭐⭐ Very Good',
                                    5 => '⭐⭐⭐⭐⭐ Excellent',
                                ])
                                ->required(),

                                Forms\Components\Select::make('emotional_state')
                                    ->options([
                                        'very_positive' => '😄 Very Positive',
                                        'positive' => '🙂 Positive',
                                        'neutral' => '😐 Neutral',
                                        'negative' => '🙁 Negative',
                                        'very_negative' => '😢 Very Negative',
                                    ])
                                    ->required(),

                                Forms\Components\Toggle::make('found_helpful')
                                    ->label('Was this helpful?')
                                    ->default(true),

                                Forms\Components\RichEditor::make('comment')
                                    ->columnSpanFull(),

                                Forms\Components\FileUpload::make('attachments')
                                    ->multiple()
                                    ->maxFiles(3)
                                    ->disk('public')
                                    ->directory('feedback-attachments')
                                    ->imagePreviewHeight('100')
                                    ->loadingIndicatorPosition('left')
                                    ->panelAspectRatio('2:1')
                                    ->panelLayout('integrated')
                                    ->removeUploadedFileButtonPosition('right')
                                    ->uploadButtonPosition('left')
                                    ->uploadProgressIndicatorPosition('left'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Follow-up Settings')
                            ->schema([
                                Forms\Components\Toggle::make('needs_follow_up'),
                                Forms\Components\Select::make('preferred_contact_method')
                                    ->options([
                                        'email' => 'Email',
                                        'phone' => 'Phone',
                                    ])
                                    ->visible(fn (callable $get) => $get('needs_follow_up')),
                                Forms\Components\TextInput::make('contact_details')
                                    ->visible(fn (callable $get) => $get('needs_follow_up')),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('resource.title')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_anonymous')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('emotional_state')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'very_positive' => 'success',
                        'positive' => 'info',
                        'neutral' => 'warning',
                        'negative' => 'danger',
                        'very_negative' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => str_replace('_', ' ', ucfirst($state)))
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('rating')
                    ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state))
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('found_helpful')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('needs_follow_up')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('followed_up_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('emotional_state')
                    ->options([
                        'very_positive' => '😄 Very Positive',
                        'positive' => '🙂 Positive',
                        'neutral' => '😐 Neutral',
                        'negative' => '🙁 Negative',
                        'very_negative' => '😢 Very Negative',
                    ]),
                Tables\Filters\Filter::make('needs_follow_up')
                    ->query(fn (Builder $query): Builder => $query->where('needs_follow_up', true)),
                Tables\Filters\Filter::make('not_followed_up')
                    ->query(fn (Builder $query): Builder => $query->whereNull('followed_up_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFeedback::route('/'),
            // 'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
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
