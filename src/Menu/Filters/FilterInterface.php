<?php


namespace Sowren\LaravelUikit\Menu\Filters;

interface FilterInterface
{
    /**
     * Transform a menu item.
     *
     * @param array $item
     * @return array
     */
    public function transform(array $item);
}
