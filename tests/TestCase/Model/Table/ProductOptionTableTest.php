<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductOptionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductOptionTable Test Case
 */
class ProductOptionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductOptionTable
     */
    public $ProductOption;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductOption'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductOption') ? [] : ['className' => ProductOptionTable::class];
        $this->ProductOption = TableRegistry::getTableLocator()->get('ProductOption', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductOption);

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
     * Test addOptions method
     *
     * @return void
     */
    public function testAddOptions()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
