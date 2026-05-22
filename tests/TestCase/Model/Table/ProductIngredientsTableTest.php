<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductIngredientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductIngredientsTable Test Case
 */
class ProductIngredientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductIngredientsTable
     */
    protected $ProductIngredients;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ProductIngredients',
        'app.Products',
        'app.Ingredients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductIngredients') ? [] : ['className' => ProductIngredientsTable::class];
        $this->ProductIngredients = $this->getTableLocator()->get('ProductIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProductIngredients);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProductIngredientsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ProductIngredientsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
