<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\UploadBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\UploadBehavior Test Case
 */
class UploadBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\UploadBehavior
     */
    public $Upload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Upload = new UploadBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Upload);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
