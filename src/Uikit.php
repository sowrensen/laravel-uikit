<?php

namespace Sowren\LaravelUikit;

use Sowren\LaravelUikit\Menu\MenuCompiler;
use Sowren\LaravelUikit\Events\MenuCompiling;
use Illuminate\Contracts\Container\Container;

class Uikit
{
    /**
     * @var mixed
     */
    private $menu;

    /**
     * @var mixed
     */
    private $filters;

    /**
     * @var Container
     */
    private $app;

    public function __construct(Container $app)
    {
        $this->filters = $app->get('config')->get('uikit.filters');
        $this->app = $app;
    }

    public function menu()
    {
        if (empty($this->menu)) {
            $this->menu = $this->buildMenu();
        }
        return $this->menu;
    }

    private function buildMenu()
    {
        $compiler = new MenuCompiler($this->getFilters());
        event(new MenuCompiling($compiler));
        return $compiler->getMenu();
    }

    private function getFilters()
    {
        return array_map([$this->app, 'make'], $this->filters);
    }
}
