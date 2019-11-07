<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryCopyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryCopyTable Test Case
 */
class CategoryCopyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryCopyTable
     */
    public $CategoryCopy;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CategoryCopy',
        'app.BcCats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategoryCopy') ? [] : ['className' => CategoryCopyTable::class];
        $this->CategoryCopy = TableRegistry::getTableLocator()->get('CategoryCopy', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoryCopy);

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
