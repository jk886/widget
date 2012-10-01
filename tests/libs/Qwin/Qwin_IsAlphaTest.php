<?php

require_once dirname(__FILE__) . '/../../../libs/Qwin.php';
require_once dirname(__FILE__) . '/../../../libs/Qwin/IsAlpha.php';

/**
 * Test class for Qwin_IsAlpha.
 * Generated by PHPUnit on 2012-01-18 at 09:08:39.
 */
class Qwin_IsAlphaTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Qwin_IsAlpha
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Qwin_IsAlpha;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers Qwin_IsAlpha::__invoke
     */
    public function test__invoke() {
        $widget = $this->object;

        $this->assertTrue($widget->isAlpha('abcedfg'));

        $this->assertTrue($widget->isAlpha('aBcDeFg'));

        $this->assertFalse($widget->isAlpha('abcdefg1'));

        $this->assertFalse($widget->isAlpha('a bcdefg'));
    }
}