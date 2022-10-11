<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderProductTable Test Case
 */
class OrderProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderProductTable
     */
    protected $OrderProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OrderProduct',
        'app.Product',
        'app.Orderplaced',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OrderProduct') ? [] : ['className' => OrderProductTable::class];
        $this->OrderProduct = $this->getTableLocator()->get('OrderProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OrderProduct);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrderProductTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrderProductTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
