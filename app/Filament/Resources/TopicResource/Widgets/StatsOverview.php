<?php

namespace App\Filament\Resources\TopicResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Harishdurga\LaravelQuiz\Models\Topic;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total topics', Topic::all()->count()),
            Card::make('Active topics', Topic::where('is_active', 1)->count()),
            Card::make('Inactive topics', Topic::where('is_active', 0)->count()),
        ];
    }
}
