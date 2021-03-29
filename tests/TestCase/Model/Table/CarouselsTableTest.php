<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarouselsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarouselsTable Test Case
 */
class CarouselsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarouselsTable
     */
    public $Carousels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Carousels',
        'app.Positions',
        'app.Colors',
        'app.Situations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Carousels') ? [] : ['className' => CarouselsTable::class];
        $this->Carousels = TableRegistry::getTableLocator()->get('Carousels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carousels);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
