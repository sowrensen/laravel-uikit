<?php


namespace Sowren\LaravelUikit\Menu\Filters;

use Sowren\LaravelUikit\Helpers\MenuHelper;
use Sowren\LaravelUikit\Helpers\ActiveItemHelper;

class ActiveFilter implements FilterInterface
{
    /**
     * The helper class instance.
     *
     * @var ActiveItemHelper
     */
    private $activeItemHelper;

    /**
     * ActiveFilter constructor.
     *
     * @param  ActiveItemHelper  $activeItemHelper
     */
    public function __construct(ActiveItemHelper $activeItemHelper)
    {
        $this->activeItemHelper = $activeItemHelper;
    }

    /**
     * Determine active menu item and set 'active' attribute.
     *
     * @param  array  $item
     * @return array
     */
    public function transform(array $item)
    {
        if (!MenuHelper::isHeader($item) && !MenuHelper::isDivider($item)) {
            $item['active'] = $this->activeItemHelper->isActive($item);
        }
        return $item;
    }
}
