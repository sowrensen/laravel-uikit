<?php


namespace Sowren\LaravelUikit\Listeners;

use Sowren\LaravelUikit\Events\MenuCompiling;

class RegisterMenu
{
    public function handle(MenuCompiling $event)
    {
        $event->compiler->add(...config('uikit.sidebar.menu', []));
    }
}
