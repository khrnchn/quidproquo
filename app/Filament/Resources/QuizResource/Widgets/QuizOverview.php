<?php

namespace App\Filament\Resources\QuizResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Harishdurga\LaravelQuiz\Models\Quiz;

class QuizOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total quizzes', Quiz::all()->count()),
            Card::make('Published quizzes', Quiz::where('is_published', 1)->count()),
            Card::make('Average time on quiz', '3:12'),
        ];
    }
}
