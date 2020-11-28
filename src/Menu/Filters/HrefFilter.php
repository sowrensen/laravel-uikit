<?php


namespace Sowren\LaravelUikit\Menu\Filters;

use Sowren\LaravelUikit\Helpers\MenuHelper;
use Illuminate\Contracts\Routing\UrlGenerator;

class HrefFilter implements FilterInterface
{
    /**
     * @var UrlGenerator
     */
    private $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Add proper href attribute to each menu item.
     *
     * @param  array  $item
     * @return array
     */
    public function transform(array $item)
    {
        if (!MenuHelper::isHeader($item) && !MenuHelper::isDivider($item)) {
            $item['href'] = $this->makeHref($item);
        }

        return $item;
    }

    /**
     * Generate href from URL or route.
     *
     * @param  array  $item
     * @return string
     */
    private function makeHref(array $item)
    {
        // Generate href from URL
        if (isset($item['url'])) {
            return $this->urlGenerator->to($item['url']);
        }

        if (isset($item['route'])) {
            if (is_array($item['route'])) {
                $route = $item['route'][0];
                $params = $item['route'][1] ?? [];
                // Generate href from route with parameters
                return $this->urlGenerator->route($route, $params);
            }
            // Generate href from rout
            return $this->urlGenerator->route($item['route']);
        }

        // Default href
        return '#';
    }
}
