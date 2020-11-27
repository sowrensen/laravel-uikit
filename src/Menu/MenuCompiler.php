<?php


namespace Sowren\LaravelUikit\Menu;

class MenuCompiler
{
    private $menu = [];

    private $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }

    public function add(...$items)
    {
        $transformedItems = $this->transformItems($items);
        if (!empty($transformedItems)) {
            array_push($this->menu, ...$transformedItems);
        }
    }

    private function transformItems($items)
    {
        return $items;
    }
}
