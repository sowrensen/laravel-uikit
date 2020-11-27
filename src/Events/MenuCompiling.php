<?php


namespace Sowren\LaravelUikit\Events;

use Sowren\LaravelUikit\Menu\MenuCompiler;

class MenuCompiling
{
    /**
     * @var MenuCompiler
     */
    public $compiler;

    public function __construct(MenuCompiler $compiler)
    {
        $this->compiler = $compiler;
    }
}
