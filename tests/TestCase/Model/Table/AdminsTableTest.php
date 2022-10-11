<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdminsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdminsTable Test Case
 */
class AdminsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdminsTable
     */
    protected $Admins;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Admins',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Admins') ? [] : ['className' => AdminsTable::class];
        $this->Admins = $this->getTableLocator()->get('Admins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Admins);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdminsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
