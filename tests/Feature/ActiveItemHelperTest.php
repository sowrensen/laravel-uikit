<?php


namespace Sowren\LaravelUikit\Test\Feature;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Sowren\LaravelUikit\Test\TestCase;
use Illuminate\Routing\RouteCollection;
use Sowren\LaravelUikit\Helpers\ActiveItemHelper;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ActiveItemHelperTest extends TestCase
{
    public function makeUrlGenerator($uri = "http://example.com")
    {
        return new UrlGenerator(
            new RouteCollection(),
            Request::createFromBase(SymfonyRequest::create($uri))
        );
    }

    public function makeActiveItemHelper($uri = "http://example.com")
    {
        return new ActiveItemHelper($this->makeUrlGenerator($uri));
    }

    /** @test */
    public function testItemWithUrl()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertTrue($activeHelper->isActive(['url' => '/profile']));
    }

    /** @test */
    public function testSubmenuItemWithUrl()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertTrue($activeHelper->isActive([
            'submenu' => [
                ['url' => '/change-avatar',],
                ['url' => '/profile']
            ]
        ]));
    }

    /** @test */
    public function testHeaderShouldNotActive()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertFalse($activeHelper->isActive(['header' => 'General']));
    }

    /** @test */
    public function testDividerShouldNotActive()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertFalse($activeHelper->isActive(['divider' => true]));
    }

    /** @test */
    public function testItemWithActiveStringAttribute()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertTrue($activeHelper->isActive(['active' => 'profile']));
    }

    /** @test */
    public function testItemWithActiveBoolAttribute()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertTrue($activeHelper->isActive(['active' => true]));
    }

    /** @test */
    public function testItemWithActiveArrayAttribute()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/profile');
        $this->assertTrue($activeHelper->isActive(['active' => ['profile']]));
    }

    /** @test */
    public function testItemWithActiveRegexStringAttribute()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/users/4/profile');
        $this->assertTrue($activeHelper->isActive(['active' => "regex:/users\/\d+\/profile/"]));
    }

    /** @test */
    public function testItemWithOneMatchedActivePatternAttribute()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/users/4/profile');
        $this->assertTrue($activeHelper->isActive([
            'active' => [
                'users/*/profile', // matched pattern
                'user/profile' // unmatched pattern
            ]
        ]));
    }

    /** @test */
    public function testItemWithUnmatchedPattern()
    {
        $activeHelper = $this->makeActiveItemHelper('http://example.com/users/4/profile');
        $this->assertFalse($activeHelper->isActive(['active' => ['/something/else']]));
    }
}
