<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountPaymentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountPaymentsTable Test Case
 */
class AccountPaymentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountPaymentsTable
     */
    protected $AccountPayments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.AccountPayments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountPayments') ? [] : ['className' => AccountPaymentsTable::class];
        $this->AccountPayments = $this->getTableLocator()->get('AccountPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AccountPayments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\AccountPaymentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
