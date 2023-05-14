<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production') || $this->app->environment('staging')) {
            \URL::forceScheme('https');
        }

        Filament::registerNavigationGroups([
            'Manage',
            'Blog',
            'Settings',
        ]);
    }
}
