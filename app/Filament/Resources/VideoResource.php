<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use HasPageShield;


class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Resources';

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('channel')
                    ->required(),
                TextInput::make('embed')
                    ->helperText('Make sure to enter the embed link instead of the video URL.')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('channel'),
                TextColumn::make('embed')
                    ->limit(40)
                    ->hidden(!auth()->user()->hasRole('super_admin')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->actions([
                Action::make('video')
                    ->icon('heroicon-o-play')
                    ->label('Play video')
                    ->action(function () {
                    })
                    ->form(function ($record) {
                        return [
                            View::make('video')->view('iframe', ['embed' => $record->embed]),
                        ];
                    })
                    ->modalActions(fn ($action): array => [
                        $action->getModalSubmitAction()
                            ->hidden(true),

                        $action->getModalCancelAction()
                            ->label('Close'),
                    ]),
            ]);
    }


    protected function getShieldRedirectPath(): string
    {
        if (auth()->user()->hasRole('super_admin')) {
            return '/list';
        } else {
            return '/';
        }
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
            'index' => Pages\ListVideos::route('/'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
            'list' => Pages\Videos::route('/list'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
