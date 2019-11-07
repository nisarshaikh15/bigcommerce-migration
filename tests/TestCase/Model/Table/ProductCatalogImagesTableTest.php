<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCatalogImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCatalogImagesTable Test Case
 */
class ProductCatalogImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCatalogImagesTable
     */
    public $ProductCatalogImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductCatalogImages',
        'app.ItemGroups',
        'app.Promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductCatalogImages') ? [] : ['className' => ProductCatalogImagesTable::class];
        $this->ProductCatalogImages = TableRegistry::getTableLocator()->get('ProductCatalogImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductCatalogImages);

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
