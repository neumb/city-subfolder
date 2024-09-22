<?php

namespace App\Providers;

use App\Http\Routing\Matching\UriValidator;
use App\Resolvers\Contracts\CityResolver;
use App\Resolvers\SessionCityResolver;
use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Matching\MethodValidator;
use Illuminate\Routing\Matching\SchemeValidator;
use Illuminate\Routing\Matching\UriValidator as UriValidatorDelegate;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

final class CityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CityResolver::class, SessionCityResolver::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::$validators = [
            new UriValidator(new UriValidatorDelegate), new MethodValidator,
            new SchemeValidator, new HostValidator,
        ];
    }
}
