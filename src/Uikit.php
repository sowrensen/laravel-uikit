<?php

namespace Sowren\LaravelUikit;

use Sowren\LaravelUikit\Menu\MenuCompiler;
use Sowren\LaravelUikit\Events\MenuCompiling;
use Illuminate\Contracts\Container\Container;

class Uikit
{
    /**
     * The application menu items.
     *
     * @var mixed
     */
    private $menu;

    /**
     * List of filters to be applied on menu items.
     *
     * @var mixed
     */
    private $filters;

    /**
     * The application service container.
     *
     * @var Container
     */
    private $app;

    /**
     * Uikit constructor.
     *
     * @param  Container  $app
     */
    public function __construct(Container $app)
    {
        $this->filters = $app->get('config')->get('uikit.filters');
        $this->app = $app;
    }

    /**
     * Get the application menu items.
     *
     * @return array|mixed
     */
    public function menu()
    {
        if (empty($this->menu)) {
            $this->menu = $this->buildMenu();
        }
        return $this->menu;
    }

    /**
     * Build the application menu.
     *
     * @return array
     */
    private function buildMenu()
    {
        $compiler = new MenuCompiler($this->getFilters());
        event(new MenuCompiling($compiler));
        return $compiler->getMenu();
    }

    /**
     * Process and return the list of filters.
     *
     * @return array
     */
    private function getFilters()
    {
        return array_map([$this->app, 'make'], $this->filters);
    }
}
