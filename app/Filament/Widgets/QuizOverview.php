<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Harishdurga\LaravelQuiz\Models\Topic;

class QuizOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total quizzes', Quiz::where('is_published', true)->count())
                ->description(Topic::all()->count() . ' topics')
                ->descriptionIcon('heroicon-s-trending-up'),

            Card::make('Total questions', Question::all()->count()),

            Card::make('Published Articles ', Article::all()->count()),

        ];
    }
}
