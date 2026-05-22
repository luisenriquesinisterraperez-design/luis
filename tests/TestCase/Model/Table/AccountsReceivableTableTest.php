<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountsReceivableTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountsReceivableTable Test Case
 */
class AccountsReceivableTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountsReceivableTable
     */
    protected $AccountsReceivable;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.AccountsReceivable',
        'app.Clients',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountsReceivable') ? [] : ['className' => AccountsReceivableTable::class];
        $this->AccountsReceivable = $this->getTableLocator()->get('AccountsReceivable', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AccountsReceivable);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\AccountsReceivableTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\AccountsReceivableTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
