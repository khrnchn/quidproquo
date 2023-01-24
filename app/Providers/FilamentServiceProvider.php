<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
            
            // Filament::registerNavigationGroups([
            //     NavigationGroup::make()
            //         ->label('Manage')
            //         ->icon('heroicon-s-pencil'),

            //     NavigationGroup::make()
            //         ->label('Settings')
            //         ->icon('heroicon-s-cog')
            //         ->collapsed(),
            // ]);
        });
    }
}
