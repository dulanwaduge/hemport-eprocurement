<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SellerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SellerTable Test Case
 */
class SellerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SellerTable
     */
    protected $Seller;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Seller',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Seller') ? [] : ['className' => SellerTable::class];
        $this->Seller = $this->getTableLocator()->get('Seller', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Seller);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SellerTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SellerTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
