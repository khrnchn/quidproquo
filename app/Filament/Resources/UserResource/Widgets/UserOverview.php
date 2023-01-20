<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total users', User::all()->count()),
            Card::make('Active users', User::all()->count()),
            Card::make('Average time browsing', '3:12'),
        ];
    }
}
