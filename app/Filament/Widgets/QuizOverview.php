<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;

class QuizOverview extends BaseWidget
{
    protected function getCards(): array
    {  
        return [
            Card::make('Active quizzes', Quiz::where('is_published', true)->count())
                ->description(QuizQuestion::all()->count() . ' questions')
                ->descriptionIcon('heroicon-s-trending-up'),

            Card::make('Questions answered', QuizAttemptAnswer::whereNotNull('question_option_id')->count())
                ->description('out of ' . QuizQuestion::all()->count() . ' questions'),

            Card::make('Last answered on ', QuizAttemptAnswer::latest('created_at')->value('created_at')->format('j F Y'))

        ];
    }
}
