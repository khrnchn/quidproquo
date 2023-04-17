<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\Pages\AnswerQuiz;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Filament\Resources\QuizResource\RelationManagers\QuestionsRelationManager;
use App\Filament\Resources\QuizResource\RelationManagers\TopicsRelationManager;
use App\Filament\Resources\QuizResource\Widgets\QuizOverview;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Http\Livewire\Notifications;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Icetalker\FilamentStepper\Forms\Components\Stepper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RalphJSmit\Filament\Components\Forms\Timestamps;
use RalphJSmit\Filament\Components\Forms\Sidebar;

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
                                TextInput::make('name')->required(),
                                TextInput::make('slug')->required(),
                                Textarea::make('description')->required(),
                                FileUpload::make('media_url')
                                    ->disk('quiz')
                                    ->image()
                                    // 12 mb
                                    ->maxSize(12000)
                                    ->required()
                                    ->label(__('Image'))
                                    ->placeholder(__('Upload Quiz Image Here'))
                                    ->imageCropAspectRatio('18:9')
                                    ->imageResizeTargetWidth('720')
                                    ->imageResizeTargetHeight('350'),
                            ])->columns(1),
                    ])->columnSpan(2),

                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Time Management')
                            ->schema([
                                Forms\Components\TextInput::make('duration')->required()->default(1800)->name('Duration in seconds'),

                                DateTimePicker::make('valid_from')
                                    ->default(now())
                                    ->label('Valid from')
                                    ->required(),

                                DateTimePicker::make('valid_upto')
                                    ->label('Valid upto')
                                    ->required(),

                                Toggle::make('is_published')
                                    ->onIcon('heroicon-s-lightning-bolt')
                                    ->offIcon('heroicon-s-lightning-bolt')
                                    ->default(true)
                                    ->inline(false),
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
                Tables\Columns\ImageColumn::make('media_url')
                    ->square()
                    ->disk('quiz')
                    ->grow(false),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->weight('medium')
                    ->limit(50),

                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable()
                    ->limit(50)
                    ->label('Slug')  
                    ->hidden(
                        function (?Model $record) {
                            if (auth()->user()->hasRole('filament_user')) {
                                // if filament_user, hide column
                                return true;
                            }
                            // show column if not filament_user
                            return false;
                        }
                    ),

                Tables\Columns\TextColumn::make('valid_from')
                    ->color('secondary')
                    ->hidden(
                        function (?Model $record) {
                            if (auth()->user()->hasRole('filament_user')) {
                                // if filament_user, hide column
                                return true;
                            }
                            // show column if not filament_user
                            return false;
                        }
                    ),

                Tables\Columns\TextColumn::make('valid_upto')
                    ->color('secondary')
                    ->hidden(
                        function (?Model $record) {
                            if (auth()->user()->hasRole('filament_user')) {
                                // if filament_user, hide column
                                return true;
                            }
                            // show column if not filament_user
                            return false;
                        }
                    ),

                Tables\Columns\TextColumn::make('duration')
                    ->getStateUsing(function ($record) {
                        $durationInSeconds = $record->duration;
                        $duration = '';

                        if ($durationInSeconds >= 3600) {
                            $hours = intval($durationInSeconds / 3600);
                            $durationInSeconds -= $hours * 3600;
                            $duration .= $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ';
                        }

                        if ($durationInSeconds >= 60) {
                            $minutes = intval($durationInSeconds / 60);
                            $durationInSeconds -= $minutes * 60;
                            $duration .= $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ';
                        }

                        if ($durationInSeconds > 0 || empty($duration)) {
                            $duration .= $durationInSeconds . ' second' . ($durationInSeconds > 1 ? 's' : '');
                        }

                        return trim($duration);
                    })
                    ->icon('heroicon-o-clock'),

                Tables\Columns\TextColumn::make('created_at')
                    ->getStateUsing(function ($record) {
                        return Carbon::parse($record->created_at)->format('j F Y');
                    })
                    ->icon('heroicon-o-calendar'),

                // nanti buat only show published
                BooleanColumn::make('is_published')
                    ->label('Published')
                    ->hidden(
                        function (?Model $record) {
                            if (auth()->user()->hasRole('filament_user')) {
                                // if filament_user, hide column
                                return true;
                            }
                            // show column if not filament_user
                            return false;
                        }
                    ),

                Tables\Columns\Layout\Panel::make([
                    Tables\Columns\TextColumn::make('description')
                        ->size('sm'),
                ])->collapsible(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('attemptQuiz')
                    ->label(__('Attempt'))
                    // nanti buat hide action kalau tengah attempt quiz nya
                    // ->hidden(fn ($record) => $record->attempt != null)
                    ->action(function ($livewire, Quiz $record, array $data): void {
                        $newQuizAttempt = $record->attempts()->create([
                            'quiz_id' => $record->id,
                            'participant_id' => Auth::id(),
                        ]);

                        $livewire->redirect(QuizResource::getURL('answer', $record->id));
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Attempt Quiz')
                    ->modalSubheading('Are you sure you\'d like to attempt the quiz?')
                    ->modalButton('Yes')
                    ->icon('heroicon-s-book-open')
                    ->hidden(
                        function (?Model $record) {
                            if (auth()->user()->hasRole('super_admin')) {
                                // if filament_user, hide column
                                return true;
                            }
                            // show column if not filament_user
                            return false;
                        }
                    ),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->contentGrid([
                'default' => 1,
                'md' => 2,
                'xl' => 3,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TopicsRelationManager::class,
            QuestionsRelationManager::class,
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
            'answer' => Pages\AnswerQuiz::route('/{record}/answer'),
        ];
    }
}
