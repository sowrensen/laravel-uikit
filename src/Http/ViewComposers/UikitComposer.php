<?php


namespace Sowren\LaravelUikit\Http\ViewComposers;

use Illuminate\View\View;
use Sowren\LaravelUikit\Uikit;

class UikitComposer
{
    /**
     * The uikit instance.
     *
     * @var Uikit
     */
    private $uikit;

    /**
     * UikitComposer constructor.
     *
     * @param  Uikit  $uikit
     */
    public function __construct(Uikit $uikit)
    {
        $this->uikit = $uikit;
    }

    /**
     * Bind the composer object.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with('uikit', $this->uikit);
    }
}
