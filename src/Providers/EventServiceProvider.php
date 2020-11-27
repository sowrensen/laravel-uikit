<?php


namespace Sowren\LaravelUikit\Providers;

use Sowren\LaravelUikit\Events\MenuCompiling;
use Sowren\LaravelUikit\Listeners\RegisterMenu;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
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
