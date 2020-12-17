<?php

namespace Sowren\LaravelUikit;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Sowren\LaravelUikit\Events\MenuCompiling;
use Sowren\LaravelUikit\Listeners\RegisterMenu;
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
     * Get any specified file/directory path within the package.
     *
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
     * @return void
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
     * @return void
     */
    private function registerViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'uikit');
    }

    /**
     * Load package config file.
     *
     * @return void
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom($this->packagePath("config/uikit.php"), "uikit");
    }

    /**
     * Register the view composers.
     *
     * @return void
     */
    private function registerViewComposer()
    {
        \View::composer('uikit::page', UikitComposer::class);
    }

    /**
     * Register event listeners of this package.
     *
     * @return void
     */
    private function registerEventListeners()
    {
        Event::listen(MenuCompiling::class, [RegisterMenu::class, 'handle']);
    }
}
