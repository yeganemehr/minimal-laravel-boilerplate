<?php

namespace Vendor\Project;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends SupportServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->booted(function () {
            $this->app['router']->getRoutes()->refreshNameLookups();
            $this->app['router']->getRoutes()->refreshActionLookups();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Route::middleware('api')
            ->prefix("api")
            ->name('api.')
            ->group(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
