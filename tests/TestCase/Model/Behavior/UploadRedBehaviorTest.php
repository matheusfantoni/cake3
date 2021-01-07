<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\UploadRedBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\UploadRedBehavior Test Case
 */
class UploadRedBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\UploadRedBehavior
     */
    public $UploadRed;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->UploadRed = new UploadRedBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UploadRed);

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
