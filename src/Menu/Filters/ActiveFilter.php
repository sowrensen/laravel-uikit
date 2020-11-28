<?php


namespace Sowren\LaravelUikit\Menu\Filters;

class ActiveFilter implements FilterInterface
{
    /**
     * @inheritDoc
     */
    public function transform(array $item)
    {
        return $item;
    }
}
