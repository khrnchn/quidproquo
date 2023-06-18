<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('question')
                    ->label('Question Details')
                    ->schema([
                        Textarea::make('name')
                            ->required(),
                        FileUpload::make('media_url')
                            ->disk('question')
                            ->image()
                            // 12 mb
                            ->maxSize(12000)
                            ->label(__('Image'))
                            ->placeholder(__('Upload Question Image Here'))
                            ->imageCropAspectRatio('18:9')
                            ->imageResizeTargetWidth('720')
                            ->imageResizeTargetHeight('350'),

                        Toggle::make('is_active')
                            ->onIcon('heroicon-s-lightning-bolt')
                            ->offIcon('heroicon-s-lightning-bolt')
                            ->inline(false),

                        // Fieldset::make('options')
                        //     ->label('Question Options')
                        //     ->schema([
                        //         Repeater::make('options')
                        //             ->label('')
                        //             ->schema([
                        //                 Forms\Components\TextInput::make('name')
                        //                     ->required()
                        //                     ->maxLength(255)
                        //                     ->label('Option'),

                        //                 Forms\Components\TextArea::make('explanation')
                        //                     ->required()
                        //                     ->maxLength(255)
                        //                     ->label('Explanation'),

                        //                 Toggle::make('is_correct')
                        //                     ->onIcon('heroicon-s-check')
                        //                     ->offIcon('heroicon-s-check')
                        //                     ->inline(false),
                        //             ]),
                        //     ])->columns(1),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->limit(80),
                BooleanColumn::make('is_active')->label('Status'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
