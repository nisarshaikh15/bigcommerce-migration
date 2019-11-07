<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductOptionNewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductOptionNewTable Test Case
 */
class ProductOptionNewTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductOptionNewTable
     */
    public $ProductOptionNew;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductOptionNew'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductOptionNew') ? [] : ['className' => ProductOptionNewTable::class];
        $this->ProductOptionNew = TableRegistry::getTableLocator()->get('ProductOptionNew', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductOptionNew);

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
