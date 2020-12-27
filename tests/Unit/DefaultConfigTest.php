<?php


namespace Sowren\LaravelUikit\Test\Unit;

use Sowren\LaravelUikit\Test\TestCase;
use Sowren\LaravelUikit\Menu\Filters\HrefFilter;
use Sowren\LaravelUikit\Menu\Filters\ClassFilter;
use Sowren\LaravelUikit\Menu\Filters\ActiveFilter;

class DefaultConfigTest extends TestCase
{
    /** @test */
    public function testUiConfig()
    {
        $this->assertNull(\Config::get('uikit.brand_logo'));
        $this->assertEquals('#262626', \Config::get('uikit.navbar.background'));
        $this->assertFalse(\Config::get('uikit.navbar.logo.display_image'));
        $this->assertTrue(\Config::get('uikit.navbar.user_section.enabled'));
        $this->assertIsArray(\Config::get('uikit.sidebar.menu'));
        $this->assertEquals('#EAEAEA', \Config::get('uikit.footer.background'));
    }

    /** @test */
    public function testFilters()
    {
        $filters = \Config::get('uikit.filters');
        $this->assertNotEmpty($filters);
        $this->assertEquals(HrefFilter::class, $filters[0]);
        $this->assertEquals(ActiveFilter::class, $filters[1]);
        $this->assertEquals(ClassFilter::class, $filters[2]);
    }
}
