<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YahooProductCatalogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YahooProductCatalogTable Test Case
 */
class YahooProductCatalogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\YahooProductCatalogTable
     */
    public $YahooProductCatalog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.YahooProductCatalog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('YahooProductCatalog') ? [] : ['className' => YahooProductCatalogTable::class];
        $this->YahooProductCatalog = TableRegistry::getTableLocator()->get('YahooProductCatalog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YahooProductCatalog);

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
     * Test getProducts method
     *
     * @return void
     */
    public function testGetProducts()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
