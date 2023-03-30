<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Filament\Resources\QuizResource\RelationManagers\TopicsRelationManager;
use App\Filament\Resources\QuizResource\Widgets\QuizOverview;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Icetalker\FilamentStepper\Forms\Components\Stepper;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                    ->schema([
                        Section::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('name')->required(),
                                Forms\Components\TextInput::make('slug')->required(),
                                Forms\Components\Textarea::make('description')->required(),
                                Toggle::make('is_published')
                                    ->onIcon('heroicon-s-lightning-bolt')
                                    ->offIcon('heroicon-s-lightning-bolt')
                                    ->default(true)
                                    ->inline(false),
                            ])->columns(2),

                        Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->disk('public')
                                    ->directory('question-images')
                                    ->preserveFilenames()
                                    ->name('Image')
                            ]),
                    ])->columnSpan(2),

                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Time Management')
                            ->schema([
                                Forms\Components\TextInput::make('duration')->required()->default(1800)->name('Duration in seconds'),

                                DateTimePicker::make('valid_from')
                                    ->default(now())
                                    ->required(),

                                DateTimePicker::make('valid_upto')
                                    ->required(),
                            ]),

                        Section::make('Marking')
                            ->schema([
                                Stepper::make('total_marks')
                                    ->minValue(1)
                                    ->maxValue(100)
                                    ->default(100)
                                    ->step(1),

                                Stepper::make('pass_marks')
                                    ->minValue(1)
                                    ->maxValue(100)
                                    ->default(80)
                                    ->step(1),

                                Stepper::make('max_attempts')
                                    ->minValue(1)
                                    ->maxValue(3)
                                    ->default(1)
                                    ->step(1),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()->limit(50)->label('Quiz'),
                Tables\Columns\TextColumn::make('slug')->sortable()->searchable()->limit(50)->label('Slug'),
                Tables\Columns\TextColumn::make('valid_from')->label('From'),
                Tables\Columns\TextColumn::make('valid_upto')->label('To'),
                BooleanColumn::make('is_published')->label('Published'),
                Tables\Columns\TextColumn::make('duration')->label('Duration'),
            ])
            ->filters([
                //
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
            TopicsRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            QuizOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
