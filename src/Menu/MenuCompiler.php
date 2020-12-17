<?php


namespace Sowren\LaravelUikit\Menu;

use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Self_;
use Sowren\LaravelUikit\Helpers\MenuHelper;
use Sowren\LaravelUikit\BookmarkIsNotFound;

class MenuCompiler
{
    private const BEFORE = 0;
    private const AFTER = 1;
    private const INSIDE = 2;

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

    /**
     * MenuCompiler constructor.
     *
     * @param $filters
     */
    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    /**
     * Get the processed menu items.
     *
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

    public function addBefore($bookmark, ...$items)
    {
        $this->addDynamically($bookmark, self::BEFORE, ...$items);
    }

    public function addAfter($bookmark, ...$items)
    {
        $this->addDynamically($bookmark, self::AFTER, ...$items);
    }

    public function addInside($bookmark, ...$items)
    {
        $this->addDynamically($bookmark, self::INSIDE, ...$items);
    }

    private function addDynamically($bookmark, $placement, ...$items)
    {
        if (!($itemPath = $this->findItem($bookmark, $this->menu))) {
            throw new BookmarkIsNotFound('The bookmark you provided is not found in the menu!');
        }
        $bookmarkIndex = last($itemPath);
        if ($placement === self::INSIDE) {
            $targetPath = implode('.', array_merge($itemPath, ['submenu']));
            $targetItem = Arr::get($this->menu, $targetPath, []);
            array_push($targetItem, ...$items);
        } else {
            $targetPath = implode('.', array_slice($itemPath, 0, -1)) ?: null;
            $targetItem = Arr::get($this->menu, $targetPath, $this->menu);
            array_splice($targetItem, $bookmarkIndex + $placement, 0, $items);
        }

        Arr::set($this->menu, $targetPath, $targetItem);
        $this->menu = $this->transformItems($this->menu);
    }

    public function findItem($bookmark, $items)
    {
        foreach ($items as $key => $item) {
            if (isset($item['bookmark']) && $item['bookmark'] === $bookmark) {
                return [$key];
            } elseif (MenuHelper::isSubmenu($item)) {
                if ($childPath = $this->findItem($bookmark, $item['submenu'])) {
                    return array_merge([$key, 'submenu'], $childPath);
                }
            }
        }
        return [];
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
            // Extract already disallowed items so
            // that filters do not applied on them
            ->filter($this->filterItem())
            // Apply filters on each item
            ->map(function ($item) {
                return $this->applyFilters($item);
            })
            // Check item visibility again, allowing any
            // custom user defined filters to work
            ->filter($this->filterItem())
            ->toArray();
    }

    /**
     * Filter out disallowed items.
     *
     * @return \Closure
     */
    private function filterItem()
    {
        return function ($item) {
            return MenuHelper::isAllowed($item) && MenuHelper::isValidSidebarItem($item);
        };
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
