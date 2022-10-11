<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FarmerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FarmerTable Test Case
 */
class FarmerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FarmerTable
     */
    protected $Farmer;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Farmer',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Farmer') ? [] : ['className' => FarmerTable::class];
        $this->Farmer = $this->getTableLocator()->get('Farmer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Farmer);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FarmerTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FarmerTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
