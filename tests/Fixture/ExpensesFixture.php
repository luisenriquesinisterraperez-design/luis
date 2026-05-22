<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExpensesFixture
 */
class ExpensesFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'amount' => 1.5,
                'date' => '2026-04-18',
                'created' => '2026-04-18 15:09:39',
                'modified' => '2026-04-18 15:09:39',
            ],
        ];
        parent::init();
    }
}
