<?php

namespace Sowren\Package;

use Illuminate\Support\ServiceProvider;

class SamplePackageServiceProvider extends ServiceProvider
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
        $this->app->singleton('SamplePackage', function ($app) {
            return new \Sowren\Package\SamplePackage();
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
            __DIR__.'/../config/package.php' => config_path('package.php'),
        ], 'sample-package-config');
    }
}
