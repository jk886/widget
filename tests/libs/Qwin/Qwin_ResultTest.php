<?php
require_once dirname(__FILE__) . '/../../../libs/Qwin.php';
require_once dirname(__FILE__) . '/../../../libs/Qwin/Result.php';

/**
 * Test class for Qwin_Result.
 * Generated by PHPUnit on 2012-01-18 at 09:10:50.
 */
class Qwin_ResultTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Qwin_Result
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Qwin_Result;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers Qwin_Result::__invoke
     */
    public function test__invoke() {
        $widget = $this->object;

        $result = $widget->result('message', -1, array(
            'data' => 'append data',
        ));

        $this->assertArrayHasKey('data', $result);

        $this->assertCount(3, $result);

        $this->assertEquals(array(
            'code' => -1,
            'message' => 'message',
            'data' => 'append data',
        ), $result);
    }

}