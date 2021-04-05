<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnunciosSituationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnunciosSituationsTable Test Case
 */
class AnunciosSituationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnunciosSituationsTable
     */
    public $AnunciosSituations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AnunciosSituations',
        'app.Colors',
        'app.Anuncios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AnunciosSituations') ? [] : ['className' => AnunciosSituationsTable::class];
        $this->AnunciosSituations = TableRegistry::getTableLocator()->get('AnunciosSituations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnunciosSituations);

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
