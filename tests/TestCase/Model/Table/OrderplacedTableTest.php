<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderplacedTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderplacedTable Test Case
 */
class OrderplacedTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderplacedTable
     */
    protected $Orderplaced;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Orderplaced',
        'app.Buyer',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Orderplaced') ? [] : ['className' => OrderplacedTable::class];
        $this->Orderplaced = $this->getTableLocator()->get('Orderplaced', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Orderplaced);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrderplacedTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrderplacedTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
