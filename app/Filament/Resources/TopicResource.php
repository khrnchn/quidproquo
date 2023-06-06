<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers\QuestionsRelationManager;
use App\Filament\Resources\TopicResource\Widgets\StatsOverview;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Harishdurga\LaravelQuiz\Models\Topic as ModelsTopic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TopicResource extends Resource
{
    protected static ?string $model = ModelsTopic::class;

    protected static ?string $recordTitleAttribute = 'name';


    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Grid::make(3)
                        ->schema([

                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->lazy()
                                ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                            Forms\Components\TextInput::make('slug')
                                ->disabled()
                                ->required()
                                ->unique(Brand::class, 'slug', ignoreRecord: true),

                            Toggle::make('is_active')
                                ->onIcon('heroicon-s-lightning-bolt')
                                ->offIcon('heroicon-s-lightning-bolt')
                                ->inline(false),
                        ]),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()->label('Topic'),

                Tables\Columns\TextColumn::make('slug'),

                BooleanColumn::make('is_active')->label('Status'),

            ])
            ->defaultSort(column: 'updated_at', direction: 'desc')
            ->filters([
                Filter::make('Active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),

                Filter::make('Inactive')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', false))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            QuestionsRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopics::route('/'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
        ];
    }
}
