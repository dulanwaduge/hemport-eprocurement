<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCategoryTable Test Case
 */
class ProductCategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCategoryTable
     */
    protected $ProductCategory;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductCategory',
        'app.Product',
        'app.Category',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductCategory') ? [] : ['className' => ProductCategoryTable::class];
        $this->ProductCategory = $this->getTableLocator()->get('ProductCategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductCategory);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductCategoryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
