<?php


namespace Sowren\LaravelUikit\Providers;

use Sowren\LaravelUikit\Events\MenuCompiling;
use Sowren\LaravelUikit\Listeners\RegisterMenu;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MenuCompiling::class => [
            RegisterMenu::class
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
