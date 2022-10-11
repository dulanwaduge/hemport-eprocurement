<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManufacturesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManufacturesTable Test Case
 */
class ManufacturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManufacturesTable
     */
    protected $Manufactures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Manufactures',
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
        $config = $this->getTableLocator()->exists('Manufactures') ? [] : ['className' => ManufacturesTable::class];
        $this->Manufactures = $this->getTableLocator()->get('Manufactures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Manufactures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ManufacturesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ManufacturesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
