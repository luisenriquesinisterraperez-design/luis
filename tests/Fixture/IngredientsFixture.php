<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IngredientsFixture
 */
class IngredientsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'stock' => 1.5,
                'unit' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-20 18:05:23',
                'modified' => '2026-04-20 18:05:23',
            ],
        ];
        parent::init();
    }
}
