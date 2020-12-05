<?php


namespace Sowren\LaravelUikit\Test;

use Illuminate\Http\Request;
use Sowren\LaravelUikit\Uikit;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Routing\RouteCollection;
use Sowren\LaravelUikit\UikitServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Sowren\LaravelUikit\Helpers\ActiveItemHelper;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

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

    public function makeUrlGenerator($uri = "http://example.com")
    {
        return new UrlGenerator(
            new RouteCollection(),
            Request::createFromBase(SymfonyRequest::create($uri))
        );
    }

    public function makeActiveItemHelper($uri = "http://example.com")
    {
        return new ActiveItemHelper($this->makeUrlGenerator($uri));
    }
}
