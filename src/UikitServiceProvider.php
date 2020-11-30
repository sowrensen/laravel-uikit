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

    public function register()
    {
        $this->app->singleton(Uikit::class, function (Container $app) {
            return new Uikit($app);
        });
    }

    /**
     * Register all package resources.
     *
     * @return void
     */
    private function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'uikit');
        $this->registerViewComposer();
        $this->registerEventListeners();
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

    /**
     * Register the view composers.
     *
     */
    public function registerViewComposer()
    {
        \View::composer('uikit::page', UikitComposer::class);
    }

    /**
     * Register event listeners of this package.
     *
     */
    public function registerEventListeners()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
