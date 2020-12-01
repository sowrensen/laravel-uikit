<?php


namespace Sowren\LaravelUikit\Listeners;

use Sowren\LaravelUikit\Events\MenuCompiling;

class RegisterMenu
{
    /**
     * Pass menu items to the compiler to build the menu.
     *
     * @param  MenuCompiling  $event
     */
    public function handle(MenuCompiling $event)
    {
        $event->compiler->add(...config('uikit.sidebar.menu', []));
    }
}
