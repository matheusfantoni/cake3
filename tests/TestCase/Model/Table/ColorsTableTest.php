<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColorsTable Test Case
 */
class ColorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ColorsTable
     */
    public $Colors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Colors',
        'app.Carousels',
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
        $config = TableRegistry::getTableLocator()->exists('Colors') ? [] : ['className' => ColorsTable::class];
        $this->Colors = TableRegistry::getTableLocator()->get('Colors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colors);

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
}
