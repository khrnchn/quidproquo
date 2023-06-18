<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\Pages\NewsList;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\Api;
use App\Models\News;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Resources';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->getStateUsing(function ($record) {
                        if ($record->image_url == null) {
                            $record->image_url = 'https://cheapsslsecurity.com/blog/wp-content/uploads/2022/05/social-engineering-attacks-1.jpg';
                        }

                        return $record->image_url;
                    })
                    ->width(360)
                    ->height(220),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->alignLeft(),

                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->limit(200),

                TextColumn::make('creator')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-s-pencil'),

                TextColumn::make('pubDate')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-s-calendar'),

            ])->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('read')
                    ->label('Read more')
                    ->icon('heroicon-s-external-link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNews::route('/'),
            'list' => NewsList::route('/list'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
