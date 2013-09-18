<?php

namespace Eastit\Darwin\CommonBundle\Tests\Util;

use HappyR\SlugifyBundle\Services\SlugifyService;

use Mockery as m;


/**
 * Class SlugifyServiceTest
 *
 * @author Tobias Nyholm
 *
 *
 */
class SlugifyServiceTest extends \PHPUnit_Framework_TestCase
{
    private $slugifier;
    private $urlify;

    /**
     * Before each test
     */
    public function setUp()
    {
        $this->urlify=m::mock('\URLify');
        $this->slugifier = new SlugifyService($this->urlify);
    }

    /**
     * Test downcode
     */
    public function testDowncode()
    {
        $this->urlify->shouldReceive('downcode')->with('foo', 'en')->andReturn('bar');
        $result=$this->slugifier->downcode('foo', 'en');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test filter
     */
    public function testFilter()
    {
        $this->urlify->shouldReceive('filter')->with('foo', 4711, 'en', false)->andReturn('bar');
        $result=$this->slugifier->filter('foo', 4711, 'en', false);

        $this->assertEquals('bar', $result);
    }

    /**
     * Test transliterate
     */
    public function testTransliterate()
    {
        $this->urlify->shouldReceive('transliterate')->with('foo')->andReturn('bar');
        $result=$this->slugifier->transliterate('foo');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test slugify
     */
    public function testSlugify()
    {
        $slugifier=m::mock('HappyR\SlugifyBundle\Services\SlugifyService[filter]',array($this->urlify));
        $slugifier->shouldReceive('filter')->with('foo')->andReturn('bar');

        $result=$slugifier->slugify('foo');
        $this->assertEquals('bar', $result);

    }


}
