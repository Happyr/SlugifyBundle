<?php

namespace Eastit\Darwin\CommonBundle\Tests\Util;

use HappyR\SlugifyBundle\Services\SlugifyService;

/**
 * Class SlugifyTest
 *
 * Test if the slugify works with some Swedish chars
 *
 * @author Tobias Nyholm
 *
 *
 */
class SlugifyServiceTest extends \PHPUnit_Framework_TestCase
{
    private $slugifier;

    /**
     * Before each test
     */
    public function setUp()
    {
        $this->slugifier = new SlugifyService(new \URLify());
    }

    /**
     * First test
     */
    public function testA()
    {

        $this->assertEquals('xyza',$this->slugifier->slugify('xyzå'));
    }

    /**
     * Test capitals
     */
    public function testCapitals()
    {
        $this->assertEquals('tast',$this->slugifier->slugify('TÅST'));
        $this->assertEquals('tast',$this->slugifier->slugify('TÄST'));
        $this->assertEquals('tost',$this->slugifier->slugify('TÖST'));
    }

    /**
     * Test beginning of words
     */
    public function testBeginningOfWords()
    {
        $this->assertEquals('ast',$this->slugifier->slugify('åst'));
        $this->assertEquals('ast',$this->slugifier->slugify('äst'));
        $this->assertEquals('ost',$this->slugifier->slugify('öst'));
    }

    /**
     * And test end of words
     */
    public function testEndOfWords()
    {
        $this->assertEquals('tsta',$this->slugifier->slugify('tstå'));
        $this->assertEquals('tsta',$this->slugifier->slugify('tstä'));
        $this->assertEquals('tsto',$this->slugifier->slugify('tstö'));
    }
}
