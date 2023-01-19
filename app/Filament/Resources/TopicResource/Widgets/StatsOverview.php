<?php

namespace App\Filament\Resources\TopicResource\Widgets;

use App\Models\Topic;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total topics', Topic::all()->count()),
            Card::make('Active topics', Topic::where('is_active', 1)->count()),
            Card::make('Average time on topic', '3:12'),
        ];
    }
}
