<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentraliseProductVariantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentraliseProductVariantTable Test Case
 */
class CentraliseProductVariantTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CentraliseProductVariantTable
     */
    public $CentraliseProductVariant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CentraliseProductVariant'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CentraliseProductVariant') ? [] : ['className' => CentraliseProductVariantTable::class];
        $this->CentraliseProductVariant = TableRegistry::getTableLocator()->get('CentraliseProductVariant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentraliseProductVariant);

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
