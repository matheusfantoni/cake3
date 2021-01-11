<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\DeleteArqBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\DeleteArqBehavior Test Case
 */
class DeleteArqBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\DeleteArqBehavior
     */
    public $DeleteArq;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->DeleteArq = new DeleteArqBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeleteArq);

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
