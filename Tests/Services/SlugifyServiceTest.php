<?php

namespace Eastit\Darwin\CommonBundle\Tests\Util;

use HappyR\SlugifyBundle\Services\SlugifyService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class SlugifyServiceTest
 *
 * @author Tobias Nyholm
 *
 *
 */
class SlugifyServiceTest extends WebTestCase
{
    private $slugifier;

    public function __construct()
    {
        $this->slugifier = new SlugifyService();
    }

    public function testA()
    {

        $this->assertEquals('xyza',$this->slugifier->slugify('xyzå'));
    }

    public function testCapitals()
    {
        $this->assertEquals('tast',$this->slugifier->slugify('TÅST'));
        $this->assertEquals('tast',$this->slugifier->slugify('TÄST'));
        $this->assertEquals('tost',$this->slugifier->slugify('TÖST'));
    }

    public function testBeginningOfWords()
    {
        $this->assertEquals('ast',$this->slugifier->slugify('åst'));
        $this->assertEquals('ast',$this->slugifier->slugify('äst'));
        $this->assertEquals('ost',$this->slugifier->slugify('öst'));
    }

    public function testEndOfWords()
    {
        $this->assertEquals('tsta',$this->slugifier->slugify('tstå'));
        $this->assertEquals('tsta',$this->slugifier->slugify('tstä'));
        $this->assertEquals('tsto',$this->slugifier->slugify('tstö'));
    }
}
