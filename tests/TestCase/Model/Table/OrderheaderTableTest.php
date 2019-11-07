<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderheaderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderheaderTable Test Case
 */
class OrderheaderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderheaderTable
     */
    public $Orderheader;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orderheader'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Orderheader') ? [] : ['className' => OrderheaderTable::class];
        $this->Orderheader = TableRegistry::getTableLocator()->get('Orderheader', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orderheader);

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
