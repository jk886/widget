<?php

require_once dirname(__FILE__) . '/../../../libs/Qwin.php';
require_once dirname(__FILE__) . '/../../../libs/Qwin/IsAlnum.php';

/**
 * Test class for Qwin_IsAlnum.
 * Generated by PHPUnit on 2012-01-18 at 09:10:22.
 */
class Qwin_IsAlnumTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Qwin_IsAlnum
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Qwin_IsAlnum;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers Qwin_IsAlnum::call
     */
    public function testCall() {
        $widget = $this->object;

        $widget->source = 'abcedfg';

        $this->assertTrue($widget->isAlnum());

        $widget->source = 'a2BcD3eFg4';

        $this->assertTrue($widget->isAlnum());

        $widget->source = '045fewwefds';

        $this->assertTrue($widget->isAlnum());

        $widget->source = 'a bcdefg';

        $this->assertFalse($widget->isAlnum());

        $widget->source = '-213a bcdefg';

        $this->assertFalse($widget->isAlnum());
    }

}

?>
