<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductIngredientsFixture
 */
class ProductIngredientsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'product_id' => 1,
                'ingredient_id' => 1,
                'quantity_required' => 1.5,
            ],
        ];
        parent::init();
    }
}
