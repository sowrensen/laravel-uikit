<?php


namespace Sowren\LaravelUikit\Helpers;

class MenuHelper
{
    public static function isHeader($item)
    {
        return is_string($item) || isset($item['header']);
    }

    public static function isDivider($item)
    {
        return isset($item['divider']) && $item['divider'];
    }

    public static function isLink($item)
    {
        return isset($item['text']) &&
            (isset($item['url']) || isset($item['route']));
    }

    public static function isSubmenu($item)
    {
        return isset($item['text']) &&
            (isset($item['submenu']) && is_array($item['submenu']));
    }

    public static function isAllowed($item)
    {
        $isAllowed = !(isset($item['restricted']) && $item['restricted']);
        return $item && $isAllowed;
    }

    public static function isValidSidebarItem($item)
    {
        return self::isHeader($item) ||
            self::isDivider($item) ||
            self::isSubmenu($item) ||
            self::isLink($item);
    }
}
