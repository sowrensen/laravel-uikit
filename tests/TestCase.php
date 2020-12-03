<?php


namespace Sowren\LaravelUikit\Test;

use Sowren\LaravelUikit\Uikit;
use Sowren\LaravelUikit\UikitServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    // protected function makeUikit()
    // {
    //     return new Uikit($this->makeContainer());
    // }
    //
    // protected function makeContainer()
    // {
    //     return new \Illuminate\Container\Container();
    // }

    protected function getPackageProviders($app)
    {
        return [
            UikitServiceProvider::class,
        ];
    }
}
