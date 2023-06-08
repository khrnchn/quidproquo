<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use DutchCodingCompany\FilamentSocialite\Facades\FilamentSocialite as FilamentSocialiteFacade;
use DutchCodingCompany\FilamentSocialite\FilamentSocialite;

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

        FilamentSocialiteFacade::setCreateUserCallback(fn (SocialiteUserContract $oauthUser, FilamentSocialite $socialite) => $socialite->getUserModelClass()::create([
            'name' => $oauthUser->getName(),
            'email' => $oauthUser->getEmail(),
        ]));

        Filament::registerNavigationGroups([
            'Manage',
            'Blog',
            'Settings',
        ]);
    }
}
