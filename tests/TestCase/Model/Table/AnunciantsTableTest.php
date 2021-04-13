<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnunciantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnunciantsTable Test Case
 */
class AnunciantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnunciantsTable
     */
    public $Anunciants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Anunciants',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Anunciants') ? [] : ['className' => AnunciantsTable::class];
        $this->Anunciants = TableRegistry::getTableLocator()->get('Anunciants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Anunciants);

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
