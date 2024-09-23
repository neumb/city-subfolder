<?php

namespace App\Providers;

use App\Infrastructure\Navigation;
use App\Infrastructure\NavigationItem;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Navigation::class, function (): Navigation {
            return Navigation::from(
                NavigationItem::from(name: __('Main'), route: 'home'),
                NavigationItem::from(name: __('About Us'), route: 'pages.about'),
                NavigationItem::from(name: __('News'), route: 'pages.news'),
            );
        });

        $this->app->alias(Navigation::class, 'navigation');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
