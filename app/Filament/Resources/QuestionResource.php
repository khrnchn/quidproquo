<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Widgets\QuestionOverview;
use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Filament\Resources\QuestionResource\RelationManagers\OptionsRelationManager;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Harishdurga\LaravelQuiz\Models\Question as ModelsQuestion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class QuestionResource extends Resource
{
    protected static ?string $model = ModelsQuestion::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('name')->required(),

                Toggle::make('is_active')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-lightning-bolt')
                    ->inline(false),
                    
                Forms\Components\Select::make('question_type_id')
                    ->relationship('question_type', 'name'),

                Forms\Components\FileUpload::make('media_url')
                    ->disk('public')
                    ->directory('question-images')
                    ->preserveFilenames()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()->limit(80)->label('Question'),

                Tables\Columns\TextColumn::make('media_url'),

                BooleanColumn::make('is_active')->label('Status'),
            ])

            ->filters([
                Filter::make('Active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),

                Filter::make('Inactive')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', false)),

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
            OptionsRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            QuestionOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
