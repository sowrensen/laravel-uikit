<?php


namespace Sowren\LaravelUikit\Menu;

use Sowren\LaravelUikit\Helpers\MenuHelper;

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
        return collect($items)
            ->filter(function ($item) {
                return MenuHelper::isAllowed($item);
            })
            ->map(function ($item) {
                return $this->applyFilters($item);
            });
    }

    private function applyFilters($item)
    {
        if (!is_array($item)) {
            return $item;
        }

        // if (!MenuHelper::isAllowed($item)) {
        //     return $item;
        // }

        foreach ($this->filters as $filter) {
            $item = $filter->transform($item);
        }

        if (MenuHelper::isSubmenu($item)) {
            $item['submenu'] = $this->transformItems($item);
        }

        return $item;
    }
}
