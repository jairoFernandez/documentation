<?php

namespace Tests\AppBundle\Util;

use AppBundle\Util\Utility;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilityTest extends WebTestCase
{
    /**
     * Test example of hello world
     */
    public function testHelloWorld()
    {
        $em = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $session = $this
            ->getMockBuilder(Session::class)
            ->disableOriginalConstructor()
            ->getMock();

        $utility = new Utility($em, $session);
        $text = $utility->HelloWorld();

        $this->assertEquals($text, "Hello world");
    }


}