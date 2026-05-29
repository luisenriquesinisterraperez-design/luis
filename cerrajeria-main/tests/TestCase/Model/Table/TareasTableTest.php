<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TareasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TareasTable Test Case
 */
class TareasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TareasTable
     */
    protected $Tareas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Tareas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tareas') ? [] : ['className' => TareasTable::class];
        $this->Tareas = $this->getTableLocator()->get('Tareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tareas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\TareasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
