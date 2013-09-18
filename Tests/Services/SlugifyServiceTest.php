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
    protected static $urlify;

    /**
     * We must do this before the URLify class is loaded. Mockery and static methods does not go hand in hand...
     */
    public static function setUpBeforeClass(){
        self::$urlify=m::mock('alias:URLify');
    }

    /**
     * Test downcode
     */
    public function testDowncode()
    {
        self::$urlify->shouldReceive('downcode')->with('foo', 'en')->andReturn('bar');
        $slugifier = new SlugifyService(self::$urlify);

        $result=$slugifier->downcode('foo', 'en');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test filter
     */
    public function testFilter()
    {
        self::$urlify->shouldReceive('filter')->with('foo', 4711, 'en', false)->andReturn('bar');
        $slugifier = new SlugifyService(self::$urlify);

        $result=$slugifier->filter('foo', 4711, 'en', false);

        $this->assertEquals('bar', $result);
    }

    /**
     * Test transliterate
     */
    public function testTransliterate()
    {

        self::$urlify->shouldReceive('transliterate')->with('foo')->andReturn('bar');
        $slugifier = new SlugifyService(self::$urlify);

        $result=$slugifier->transliterate('foo');

        $this->assertEquals('bar', $result);
    }

    /**
     * Test slugify
     */
    public function testSlugify()
    {
        $slugifier=m::mock('HappyR\SlugifyBundle\Services\SlugifyService[filter]',array(self::$urlify));
        $slugifier->shouldReceive('filter')->with('foo')->andReturn('bar');

        $result=$slugifier->slugify('foo');
        $this->assertEquals('bar', $result);

    }


}
