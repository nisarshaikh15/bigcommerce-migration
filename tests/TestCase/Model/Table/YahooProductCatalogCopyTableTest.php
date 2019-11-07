<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YahooProductCatalogCopyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YahooProductCatalogCopyTable Test Case
 */
class YahooProductCatalogCopyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\YahooProductCatalogCopyTable
     */
    public $YahooProductCatalogCopy;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.YahooProductCatalogCopy',
        'app.BcProducts',
        'app.BcOptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('YahooProductCatalogCopy') ? [] : ['className' => YahooProductCatalogCopyTable::class];
        $this->YahooProductCatalogCopy = TableRegistry::getTableLocator()->get('YahooProductCatalogCopy', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YahooProductCatalogCopy);

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
