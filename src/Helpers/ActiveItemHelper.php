<?php


namespace Sowren\LaravelUikit\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\UrlGenerator;

class ActiveItemHelper
{
    /**
     * @var UrlGenerator
     */
    public $url;

    /**
     * @var Request
     */
    public $request;

    /**
     * @var array|array[]
     */
    public $checkers = [];

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->url = $urlGenerator;
        $this->request = $urlGenerator->getRequest();
        $this->checkers = [
            'submenu' => [$this, 'containsActive'],
            'active' => [$this, 'isExplicitlyActive'],
            'href' => [$this, 'matchPattern'],
            'url' => [$this, 'matchPattern'],
            'route' => [$this, 'matchRoute']
        ];
    }

    /**
     * Check if a menu item is active or has active submenu.
     *
     * @param  array  $item
     * @return bool
     */
    public function isActive(array $item)
    {
        foreach ($this->checkers as $prop => $checker) {
            if (isset($item[$prop]) && $checker($item[$prop])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if a menu item contains active submenu.
     *
     * @param  array  $items
     * @return bool
     */
    public function containsActive(array $items)
    {
        foreach ($items as $item) {
            if ($this->isActive($item)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if a menu item is active against some given pattern.
     *
     * @param  mixed  $patterns
     * @return bool
     */
    public function isExplicitlyActive($patterns)
    {
        if (is_bool($patterns)) {
            return $patterns;
        }

        foreach ($patterns as $pattern) {
            if ($this->matchPattern($pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Match a pattern with the current request url.
     *
     * @param  mixed  $pattern
     * @return bool
     */
    public function matchPattern($pattern)
    {
        if (Str::startsWith($pattern, 'regex:')) {
            $regex = Str::substr($pattern, 6);
            return (bool)preg_match($regex, $this->request->path());
        }

        $pattern = preg_replace('@^https?://@', '*', $this->url->to($pattern));
        $request = preg_replace('@^https?://@', '*', $this->request->url());
        if (isset(parse_url($pattern)['query'])) {
            $request = $this->request->fullUrl();
        }

        return Str::is(trim($pattern), trim($request));
    }

    /**
     * Match a route attribute against current route.
     *
     * @param  mixed  $route
     * @return bool
     */
    public function matchRoute($route)
    {
        if (is_array($route)) {
            return $this->request->routeIs($route[0]);
        }
        return $this->request->routeIs($route);
    }
}
