<?php


namespace Sowren\LaravelUikit\Helpers;

class MenuHelper
{
    /**
     * Determine if the sidebar item is a header.
     *
     * @param $item
     * @return bool
     */
    public static function isHeader($item)
    {
        return is_string($item) || isset($item['header']);
    }

    /**
     * Determine if the sidebar item is a divider.
     *
     * @param $item
     * @return bool
     */
    public static function isDivider($item)
    {
        return isset($item['divider']) && $item['divider'];
    }

    /**
     * Determine if the sidebar item is an individual item i.e, has no child.
     *
     * @param $item
     * @return bool
     */
    public static function isLink($item)
    {
        return isset($item['text']) &&
            (isset($item['url']) || isset($item['route']));
    }

    /**
     * Determine if the sidebar item has children.
     *
     * @param $item
     * @return bool
     */
    public static function isSubmenu($item)
    {
        return isset($item['text']) &&
            (isset($item['submenu']) && is_array($item['submenu']));
    }

    /**
     * Determine if the sidebar item is restricted.
     *
     * @param $item
     * @return bool
     */
    public static function isAllowed($item)
    {
        $isAllowed = !(isset($item['restricted']) && $item['restricted']);
        return $item && $isAllowed;
    }

    /**
     * Determine if the item is valid.
     *
     * @param $item
     * @return bool
     */
    public static function isValidSidebarItem($item)
    {
        return self::isHeader($item) ||
            self::isDivider($item) ||
            self::isSubmenu($item) ||
            self::isLink($item);
    }
}
