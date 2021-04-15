<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContatosAnunciantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContatosAnunciantsTable Test Case
 */
class ContatosAnunciantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContatosAnunciantsTable
     */
    public $ContatosAnunciants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContatosAnunciants',
        'app.Anuncios',
        'app.Anunciants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContatosAnunciants') ? [] : ['className' => ContatosAnunciantsTable::class];
        $this->ContatosAnunciants = TableRegistry::getTableLocator()->get('ContatosAnunciants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContatosAnunciants);

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
