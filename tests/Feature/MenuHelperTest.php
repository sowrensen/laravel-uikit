<?php


namespace Sowren\LaravelUikit\Test\Feature;

use Sowren\LaravelUikit\Test\TestCase;
use Sowren\LaravelUikit\Helpers\MenuHelper;

class MenuHelperTest extends TestCase
{
    /** @test */
    public function testIsHeader()
    {
        $item = ['header' => 'General'];
        $this->assertTrue(MenuHelper::isHeader($item));
    }

    /** @test */
    public function testIDivider()
    {
        $item0 = ['divider' => true];
        $item1 = ['divider' => false];
        $this->assertTrue(MenuHelper::isDivider($item0));
        $this->assertFalse(MenuHelper::isDivider($item1));
    }

    /** @test */
    public function testIsLinkWithUrl()
    {
        $item = [
            'text' => 'Profile',
            'url' => '#'
        ];
        $this->assertTrue(MenuHelper::isLink($item));
    }

    /** @test */
    public function testIsLinkWithRoute()
    {
        $item = [
            'text' => 'Profile',
            'route' => 'profile'
        ];
        $this->assertTrue(MenuHelper::isLink($item));
    }

    /** @test */
    public function isSubmenu()
    {
        $item = [
            'text' => 'Accounts',
            'submenu' => [
                [
                    'text' => 'Profile',
                    'url' => '#',
                ],
                [
                    'text' => 'Change Avatar',
                    'url' => '#',
                ],
            ]
        ];
        $this->assertTrue(MenuHelper::isSubmenu($item));
    }

    /** @test */
    public function testItemAllowed()
    {
        $item = [
            'text' => 'Profile',
            'url' => '#',
            'restricted' => false
        ];
        $this->assertTrue(MenuHelper::isAllowed($item));
    }

    /** @test */
    public function testItemNotAllowed()
    {
        $item = [
            'text' => 'Profile',
            'url' => '#',
            'restricted' => true
        ];
        $this->assertFalse(MenuHelper::isAllowed($item));
    }

    /** @test */
    public function testIsValidSidebarItem()
    {
        $item = [
            'strange_key' => ['with strange value']
        ];
        $this->assertFalse(MenuHelper::isValidSidebarItem($item));
    }
}
