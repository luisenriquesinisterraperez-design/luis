<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DailyClosuresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DailyClosuresTable Test Case
 */
class DailyClosuresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DailyClosuresTable
     */
    protected $DailyClosures;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DailyClosures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DailyClosures') ? [] : ['className' => DailyClosuresTable::class];
        $this->DailyClosures = $this->getTableLocator()->get('DailyClosures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DailyClosures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DailyClosuresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
