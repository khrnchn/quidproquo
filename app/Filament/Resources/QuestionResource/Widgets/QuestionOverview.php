<?php

namespace App\Filament\Resources\QuestionResource\Widgets;

use App\Models\Question;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class QuestionOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total questions', Question::all()->count()),
            Card::make('Active questions', Question::where('is_active', 1)->count()),
            Card::make('Average time on question', '3:12'),
        ];
    }
}
