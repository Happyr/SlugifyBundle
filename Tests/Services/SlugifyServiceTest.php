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

    /**
     * Test downcode
     */
    public function testDowncode()
    {
        $urlify=m::mock('\URLify')
            ->shouldReceive('downcode')->with('foo', 'en')->andReturn('bar')
            ->getMock();
        $slugifier = new SlugifyService($urlify);

        $result=$slugifier->downcode('foo', 'en');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test filter
     */
    public function testFilter()
    {
        $urlify=m::mock('\URLify')
            ->shouldReceive('filter')->with('foo', 4711, 'en', false)->andReturn('bar')
            ->getMock();
        $slugifier = new SlugifyService($urlify);


        $result=$slugifier->filter('foo', 4711, 'en', false);

        $this->assertEquals('bar', $result);
    }

    /**
     * Test transliterate
     */
    public function testTransliterate()
    {
        $urlify=m::mock('\URLify')
            ->shouldReceive('transliterate')->with('foo')->andReturn('bar')
            ->getMock();
        $slugifier = new SlugifyService($urlify);

        $result=$slugifier->transliterate('foo');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test slugify
     */
    public function testSlugify()
    {
        $urlify=m::mock('\URLify');
        $slugifier=m::mock('HappyR\SlugifyBundle\Services\SlugifyService[filter]',array($urlify));
        $slugifier->shouldReceive('filter')->with('foo')->andReturn('bar');

        $result=$slugifier->slugify('foo');
        $this->assertEquals('bar', $result);

    }


}
