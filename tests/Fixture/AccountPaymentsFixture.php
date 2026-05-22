<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountPaymentsFixture
 */
class AccountPaymentsFixture extends TestFixture
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
                'accounts_receivable_id' => 1,
                'amount' => 1.5,
                'payment_method' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-21 18:50:53',
            ],
        ];
        parent::init();
    }
}
