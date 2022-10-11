<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyerTable Test Case
 */
class BuyerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyerTable
     */
    protected $Buyer;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Buyer',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Buyer') ? [] : ['className' => BuyerTable::class];
        $this->Buyer = $this->getTableLocator()->get('Buyer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Buyer);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BuyerTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BuyerTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
