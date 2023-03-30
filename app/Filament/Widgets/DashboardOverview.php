<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            // Card::make('Total Users', User::count())
            //     ->description('6 increase')
            //     ->chart([7, 2, 10, 3, 15, 4, 17]),

            // Card::make('Quiz Attempts', '50')
            //     ->description('7% increase'),

            // Card::make('Average time on page', '3:12')
            //     ->description('3% increase'),
        ];
    }
}
