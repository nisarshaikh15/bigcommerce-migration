<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentralizedOrderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentralizedOrderTable Test Case
 */
class CentralizedOrderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CentralizedOrderTable
     */
    public $CentralizedOrder;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CentralizedOrder'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CentralizedOrder') ? [] : ['className' => CentralizedOrderTable::class];
        $this->CentralizedOrder = TableRegistry::getTableLocator()->get('CentralizedOrder', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentralizedOrder);

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
