<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuilderTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuilderTable Test Case
 */
class BuilderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuilderTable
     */
    protected $Builder;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Builder',
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
        $config = $this->getTableLocator()->exists('Builder') ? [] : ['className' => BuilderTable::class];
        $this->Builder = $this->getTableLocator()->get('Builder', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Builder);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BuilderTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BuilderTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
