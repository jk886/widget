<?php
require_once dirname(__FILE__) . '/../../../libs/Qwin.php';

/**
 * Test class for Qwin_Log.
 * Generated by PHPUnit on 2012-02-09 at 12:17:29.
 */
class Qwin_LogTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Qwin_Log
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     * @covers Qwin_Log::__construct
     */
    protected function setUp() {
        $this->object = Qwin::getInstance()->log;
        $this->object->clean();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     * @covers Qwin_Log::clean
     */
    protected function tearDown() {
        $this->object->clean();
    }

    public static function tearDownAfterClass()
    {
        $log = Qwin::getInstance()->log;

        $log->clean();

        $log->option('save', array(
            __CLASS__, 'notSave',
        ));

        rmdir($log->option('fileDir'));
    }

    public static function notSave()
    {

    }

    /**
     * @covers Qwin_Log::__invoke
     * @covers Qwin_Log::__construct
     * @covers Qwin_Log::save
     * @covers Qwin_Log::getFileOption
     */
    public function test__invoke() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->trace(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));

        // clean all file in log diretory
        $widget->clean();

        $widget->option('level', 'debug');

        $widget->trace(__METHOD__);

        $widget->save();

        $this->assertNotContains(__METHOD__, file_get_contents($file), 'trace level is not writed');
    }

    /**
     * @covers Qwin_Log::setSaveOption
     */
    public function testSetSaveOption()
    {
        $widget = $this->object;

        $widget->setSaveOption(array($this, __METHOD__));

        $widget->setSaveOption(null);

        $this->setExpectedException('Qwin_Exception');

        $widget->setSaveOption(array($this, 'method not found'));
    }

    /**
     * @covers Qwin_Log::getFileOption
     */
    public function testGetFileOption()
    {
        $widget = $this->object;

        $widget->option('file', null);

        $widget->debug(__METHOD__);

        $widget->save();

        $oldFile = $widget->option('file');

        $size = $widget->option('fileSize');

        // always create new file
        $widget->option('fileSize', 1);

        // create the second file
        $widget->debug(__METHOD__);

        $widget->option('file', null);

        $widget->save();

        // create the thrid file
        $widget->debug(__METHOD__);

        $widget->option('file', null);

        $widget->save();

        // create the fouth file
        $widget->debug(__METHOD__);

        $widget->option('file', null);

        $widget->save();

        //$newFile = $widget->option('file');

        //$this->assertNotEquals($oldFile, $newFile);
    }

    /**
     * @covers Qwin_Log::trace
     * @covers Qwin_Log::handleSave
     */
    public function testTrace()
    {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->trace(__METHOD__);

        $widget->handleSave();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::debug
     */
    public function testDebug() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->debug(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::info
     */
    public function testInfo() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->info(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::warn
     */
    public function testWarn() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->warn(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::error
     */
    public function testError() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->error(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::fatal
     */
    public function testFatal() {
        $widget = $this->object;

        $widget->option('level', 'trace');

        $widget->fatal(__METHOD__);

        $widget->save();

        $file = $widget->option('file');

        $this->assertContains(__METHOD__, file_get_contents($file));
    }

    /**
     * @covers Qwin_Log::setFileOption
     */
    public function testSetFileOption()
    {
        $widget = $this->object;

        $dir = dirname($widget->option('file')) . DIRECTORY_SEPARATOR . __FUNCTION__;
        $file = $dir . DIRECTORY_SEPARATOR . __LINE__;

        // clean file and directory
        if (is_file($file)) {
            unlink($file);
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }

        $widget->option('file', $file);

        $widget->debug(__METHOD__);

        $widget->save();

        $this->assertFileExists($file);

        $widget->option('file', null);

        // clean again
        if (is_file($file)) {
            unlink($file);
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }
    }

    /**
     * @covers Qwin_Log::setFileDirOption
     */
    public function testSetFileDirOption()
    {
        $widget = $this->object;

        $oldDir = $widget->option('fileDir');

        $newDir = realpath($oldDir) . DIRECTORY_SEPARATOR . 'subdir';

        $widget->option('fileDir', $newDir);

        $file = $widget->option('file');

        $this->assertEquals($newDir, dirname($file));

        rmdir($newDir);

        $widget->option('fileDir', $oldDir);
    }

    /**
     * @covers Qwin_Log::setFileFormatOption
     */
    public function testSetFileFormatOption()
    {
        $widget = $this->object;

        $format = $widget->option('fileFormat');

        $file = $widget->option('file');

        $widget->option('fileFormat', 'newfile.log');

        $widget->debug(__METHOD__);

        $widget->save();

        $file = dirname($file) . DIRECTORY_SEPARATOR . 'newfile.log';

        $this->assertFileExists($file);
    }

    /**
     * @covers Qwin_Log::setFileSizeOption
     */
    public function testSetFileSizeOption()
    {
        $widget = $this->object;

        $widget->option('file', null);

        $widget->debug(__METHOD__);

        $widget->save();

        $oldFile = $widget->option('file');

        $size = $widget->option('fileSize');

        // always create new file
        $widget->option('fileSize', 1);

        $widget->debug(__METHOD__);

        $widget->save();

        $newFile = $widget->option('file');

        $this->assertNotEquals($oldFile, $newFile);
    }
}