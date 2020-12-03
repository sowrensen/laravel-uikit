<?php


namespace Sowren\LaravelUikit\Test\Feature;

use Sowren\LaravelUikit\Uikit;
use Sowren\LaravelUikit\Test\TestCase;
use Sowren\LaravelUikit\Events\MenuCompiling;

class EventTest extends TestCase
{
    /** @test */
    public function testEventIsFired()
    {
        \Event::fake([
            MenuCompiling::class
        ]);
        $uikit = $this->app->make(Uikit::class);
        $this->assertIsArray($uikit->menu());
        \Event::assertDispatched(MenuCompiling::class);
    }

    /** @test */
    public function testListenerIsWorking()
    {
        $uikit = $this->app->make(Uikit::class);
        $menu = $uikit->menu();
        $this->assertNotEmpty($menu);
        $this->assertArrayHasKey('href', $menu[1]);
        $this->assertArrayHasKey('active', $menu[1]);
        $this->assertArrayHasKey('class', $menu[1]);
    }
}
