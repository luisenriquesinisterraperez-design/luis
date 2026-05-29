<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryDriversTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryDriversTable Test Case
 */
class DeliveryDriversTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryDriversTable
     */
    protected $DeliveryDrivers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DeliveryDrivers',
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
        $config = $this->getTableLocator()->exists('DeliveryDrivers') ? [] : ['className' => DeliveryDriversTable::class];
        $this->DeliveryDrivers = $this->getTableLocator()->get('DeliveryDrivers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DeliveryDrivers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DeliveryDriversTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
