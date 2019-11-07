<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentraliseProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentraliseProductsTable Test Case
 */
class CentraliseProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CentraliseProductsTable
     */
    public $CentraliseProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CentraliseProducts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CentraliseProducts') ? [] : ['className' => CentraliseProductsTable::class];
        $this->CentraliseProducts = TableRegistry::getTableLocator()->get('CentraliseProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentraliseProducts);

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
     * Test addProducts method
     *
     * @return void
     */
    public function testAddProducts()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getProductOptions method
     *
     * @return void
     */
    public function testGetProductOptions()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
