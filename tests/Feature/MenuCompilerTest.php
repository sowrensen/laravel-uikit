<?php


namespace Sowren\LaravelUikit\Test\Feature;

use Sowren\LaravelUikit\Test\TestCase;
use Sowren\LaravelUikit\Menu\MenuCompiler;
use Sowren\LaravelUikit\Menu\Filters\HrefFilter;
use Sowren\LaravelUikit\Menu\Filters\ClassFilter;
use Sowren\LaravelUikit\Menu\Filters\ActiveFilter;

class MenuCompilerTest extends TestCase
{
    public function makeMenuCompiler()
    {
        return new MenuCompiler([
            new HrefFilter($this->makeUrlGenerator()),
            new ActiveFilter($this->makeActiveItemHelper()),
            new ClassFilter()
        ]);
    }

    /** @test */
    public function testItemIsAdded()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(['text' => 'Profile', 'url' => 'profile']);
        $this->assertCount(1, $compiler->getMenu());
    }

    /** @test */
    public function testAllFiltersAreAppliedOnExplicitLinkItem()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(['text' => 'Profile', 'url' => 'profile']);
        $menu = $compiler->getMenu();
        $this->assertArrayHasKey('href', $menu[0]);
        $this->assertArrayHasKey('active', $menu[0]);
        $this->assertArrayHasKey('class', $menu[0]);
    }

    /** @test */
    public function testOnlyClassFilterIsAppliedOnHeaderAndDivider()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(...[['header' => 'General'], ['divider' => true]]);

        $header = $compiler->getMenu()[0];
        $this->assertArrayNotHasKey('href', $header);
        $this->assertArrayNotHasKey('active', $header);

        $divider = $compiler->getMenu()[1];
        $this->assertArrayNotHasKey('href', $divider);
        $this->assertArrayNotHasKey('active', $divider);
    }

    /** @test */
    public function testOnlyOneItemIsAllowed()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(...[['text' => 'Profile', 'url' => '#', 'restricted' => true], ['divider' => true]]);
        $this->assertCount(1, $compiler->getMenu());
    }

    /** @test */
    public function testAddItemInside()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(...
            [['text' => 'Item 1', 'url' => '#'], ['text' => 'Item 2', 'submenu' => [], 'bookmark' => 'item_2']]);
        $this->assertCount(2, $compiler->getMenu());
        $this->assertCount(0, $compiler->getMenu()[1]['submenu']);
        $compiler->addInside('item_2', [
            'text' => 'Item 31',
            'url' => '#'
        ]);
        $this->assertCount(1, $compiler->getMenu()[1]['submenu']);
    }

    /** @test */
    public function testAddItemBefore()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(...
            [['text' => 'Item 1', 'url' => '#'], ['text' => 'Item 3', 'submenu' => [], 'bookmark' => 'item_3']]);
        $this->assertCount(2, $compiler->getMenu());
        $compiler->addBefore('item_3', [
            'text' => 'Item 2',
            'url' => '#'
        ]);
        $this->assertCount(3, $compiler->getMenu());
    }

    /** @test */
    public function testAddItemAfter()
    {
        $compiler = $this->makeMenuCompiler();
        $compiler->add(...
            [['text' => 'Item 1', 'url' => '#'], ['text' => 'Item 2', 'submenu' => [], 'bookmark' => 'item_2']]);
        $this->assertCount(2, $compiler->getMenu());
        $compiler->addBefore('item_2', [
            'text' => 'Item 3',
            'url' => '#'
        ]);
        $this->assertCount(3, $compiler->getMenu());
    }
}
