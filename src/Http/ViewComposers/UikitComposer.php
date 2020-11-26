<?php


namespace Sowren\LaravelUikit\Http\ViewComposers;

use Illuminate\View\View;
use Sowren\LaravelUikit\Uikit;

class UikitComposer
{
    /**
     * @var Uikit
     */
    private $uikit;

    public function __construct(Uikit $uikit)
    {
        $this->uikit = $uikit;
    }

    public function compose(View $view)
    {
        $view->with('uikit', $this->uikit);
    }
}
