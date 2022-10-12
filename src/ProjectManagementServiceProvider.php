<?php

namespace Breuermarcel\ProjectManagement;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProjectManagementServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__ . "/../resources/lang", "project-management");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "project-management");
        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
        $this->registerRoutes();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . "/../config/config.php", "project-management");

        // Register the main class to use with the facade
        $this->app->singleton("project-management", function () {
            return new ProjectManagement;
        });
    }

    private function routeConfiguration(): array
    {
        return [
            "prefix" => config("project-management.routing.prefix"),
            "middleware" => config("project-management.routing.middleware"),
        ];
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . "/routes.php");
        });
    }
}
