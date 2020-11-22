<?php

namespace Sowren\Package;

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
        $this->registerFacades();
    }

    /**
     * Register any bindings to the app.
     *
     * @return void
     */
    protected function registerFacades()
    {
        $this->app->singleton('Uikit', function ($app) {
            return new \Sowren\LaravelUikit\Uikit();
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
