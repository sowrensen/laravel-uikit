<?php


namespace Sowren\LaravelUikit\Menu\Filters;

use Sowren\LaravelUikit\Helpers\MenuHelper;

class ClassFilter implements FilterInterface
{
    /**
     * Add necessary style classes to a sidebar menu.
     *
     * @param  array  $item
     * @return array
     */
    public function transform(array $item)
    {
        $item['class'] = implode(' ', $this->makeClasses($item));

        if (MenuHelper::isSubmenu($item)) {
            $item['submenu_class'] = implode(' ', $this->makeSubmenuClasses($item));
        }

        return $item;
    }

    /**
     * Add necessary classes to a menu item.
     *
     * @param  array  $item
     * @return array
     */
    protected function makeClasses(array $item)
    {
        $classes = [];

        // Append explicitly defined classes
        if (!empty($item['classes'])) {
            $classes[] = $item['classes'];
        }

        // If item is active, add 'uk-active' class to render it as active
        if (!empty($item['active'])) {
            $classes[] = 'uk-active';
        }

        return $classes;
    }

    /**
     * Add necessary classes to a submenu item.
     *
     * @param  array  $item
     * @return array
     */
    protected function makeSubmenuClasses(array $item)
    {
        $classes = [];

        // When a menu has active child submenu, add 'uk-open' class to the parent
        if (MenuHelper::isValidSidebarItem($item) && $item['active']) {
            $classes[] = 'uk-open uk-active';
        }

        return $classes;
    }
}
