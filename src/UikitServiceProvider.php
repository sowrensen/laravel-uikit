<?php

namespace Sowren\LaravelUikit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Sowren\LaravelUikit\Providers\EventServiceProvider;
use Sowren\LaravelUikit\Http\ViewComposers\UikitComposer;

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
     * Register UIKit singleton.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Uikit::class, function (Container $app) {
            return new Uikit($app);
        });
    }

    /**
     * @param  string  $path
     * @return string
     */
    private function packagePath(string $path)
    {
        return __DIR__."/../{$path}";
    }

    /**
     * Register package's publishable resources.
     *
     */
    private function registerPublishing()
    {
        $this->publishes([
            $this->packagePath('config/uikit.php') => config_path('uikit.php'),
        ], 'uikit-config');

        $this->publishes([
            $this->packagePath('resources/views') => resource_path('views/vendor/uikit'),
        ], 'uikit-views');
    }

    /**
     * Register all package resources.
     *
     * @return void
     */
    private function registerResources()
    {
        $this->registerViews();
        $this->registerConfig();
        $this->registerViewComposer();
        $this->registerEventListeners();
    }

    /**
     * Load package views.
     *
     */
    private function registerViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'uikit');
    }

    /**
     * Load package config file.
     *
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom($this->packagePath("config/uikit.php"), "uikit");
    }

    /**
     * Register the view composers.
     *
     */
    private function registerViewComposer()
    {
        \View::composer('uikit::page', UikitComposer::class);
    }

    /**
     * Register event listeners of this package.
     *
     */
    private function registerEventListeners()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
