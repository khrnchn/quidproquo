<?php

namespace App\Filament\Resources\QuestionResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Harishdurga\LaravelQuiz\Models\Question as ModelsQuestion;

class QuestionOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total questions', ModelsQuestion::all()->count())
                ->description('10% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Card::make('Active questions', ModelsQuestion::where('is_active', 1)->count()),
            
            Card::make('Average time on question', '3:12'),
        ];
    }
}
