<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryTable Test Case
 */
class CategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryTable
     */
    protected $Category;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Category',
        'app.Product',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Category') ? [] : ['className' => CategoryTable::class];
        $this->Category = $this->getTableLocator()->get('Category', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Category);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CategoryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CategoryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
