<?php

namespace Sowren\LaravelUikit;

use Illuminate\Support\ServiceProvider;

class UikitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    /**
     * Register all package resources.
     *
     * @return void
     */
    private function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'uikit');
        $this->bindSingleton();
    }

    /**
     * Register any bindings to the app.
     *
     * @return void
     */
    protected function bindSingleton()
    {
        $this->app->singleton(Uikit::class, function ($app) {
            return new Uikit();
        });
    }

    /**
     * Register package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/uikit.php' => config_path('uikit.php'),
        ], 'laravel-uikit-config');
    }
}
