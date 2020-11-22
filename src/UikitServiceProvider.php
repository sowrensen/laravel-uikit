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
        //
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
