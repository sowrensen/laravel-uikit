<?php


namespace Sowren\LaravelUikit\Menu;

use Sowren\LaravelUikit\Helpers\MenuHelper;

class MenuCompiler
{
    /**
     * The sidebar menu items.
     *
     * @var array
     */
    private $menu = [];

    /**
     * Filters to be applied on menu items.
     *
     * @var
     */
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

    /**
     * Add new items to the sidebar menu.
     *
     * @param  mixed  ...$items
     */
    public function add(...$items)
    {
        $transformedItems = $this->transformItems($items);
        if (!empty($transformedItems)) {
            array_push($this->menu, ...$transformedItems);
        }
    }

    /**
     * Transform sidebar menu items by applying the filters.
     *
     * @param $items
     * @return array
     */
    private function transformItems($items)
    {
        return collect($items)
            ->filter(function ($item) {
                // Filter out disallowed items
                return MenuHelper::isAllowed($item) && MenuHelper::isValidSidebarItem($item);
            })
            ->map(function ($item) {
                // Apply filters only on allowed items
                return $this->applyFilters($item);
            })
            ->toArray();
    }

    /**
     * Apply filters on sidebar menu items.
     *
     * @param $item
     * @return array
     */
    private function applyFilters($item)
    {
        if (!is_array($item) || empty($this->filters)) {
            return $item;
        }

        foreach ($this->filters as $filter) {
            $item = $filter->transform($item);
        }

        // In case if current menu has a submenu, transform them as well
        if (MenuHelper::isSubmenu($item)) {
            $item['submenu'] = $this->transformItems($item['submenu']);
        }

        return $item;
    }
}
