<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SituationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SituationsTable Test Case
 */
class SituationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SituationsTable
     */
    public $Situations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Situations',
        'app.Colors',
        'app.Carousels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Situations') ? [] : ['className' => SituationsTable::class];
        $this->Situations = TableRegistry::getTableLocator()->get('Situations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Situations);

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
