<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryTable Test Case
 */
class DeliveryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryTable
     */
    protected $Delivery;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Delivery',
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
        $config = $this->getTableLocator()->exists('Delivery') ? [] : ['className' => DeliveryTable::class];
        $this->Delivery = $this->getTableLocator()->get('Delivery', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Delivery);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DeliveryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DeliveryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
