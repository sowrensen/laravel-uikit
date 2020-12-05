<?php


namespace Sowren\LaravelUikit\Test\Feature;

use Sowren\LaravelUikit\Uikit;
use Sowren\LaravelUikit\Test\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function testSingleton()
    {
        $uikit = $this->app->make(Uikit::class);
        $this->assertSame($uikit, $this->app->make(Uikit::class));
    }

    /** @test */
    public function testAllViewsAreRegistered()
    {
        $this->assertTrue(\View::exists('uikit::master'));
        $this->assertTrue(\View::exists('uikit::page'));
        $this->assertTrue(\View::exists('uikit::auth.login'));
        $this->assertTrue(\View::exists('uikit::auth.register'));
        $this->assertTrue(\View::exists('uikit::auth.forgot-password'));
    }

    /** @test */
    public function testConfigsAreMerged()
    {
        $this->assertTrue(\Config::has('uikit'));
        $this->assertTrue(\Config::has('uikit.routes'));
        $this->assertTrue(\Config::has('uikit.auth'));
        $this->assertTrue(\Config::has('uikit.navbar'));
        $this->assertTrue(\Config::has('uikit.sidebar'));
        $this->assertTrue(\Config::has('uikit.filters'));
        $this->assertTrue(\Config::has(['uikit.title', 'uikit.title_prefix', 'uikit.title_suffix']));
        $this->assertTrue(\Config::has(['uikit.brand_name', 'uikit.brand_logo']));
    }

    /** @test */
    public function testViewComposersAreRegistered()
    {
        $view = \View::make('uikit::page');
        \View::callComposer($view);
        $data = $view->getData();
        $this->assertArrayHasKey('uikit', $data);
    }
}
