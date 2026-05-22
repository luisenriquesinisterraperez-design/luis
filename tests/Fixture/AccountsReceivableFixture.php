<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountsReceivableFixture
 */
class AccountsReceivableFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'accounts_receivable';
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
                'client_id' => 1,
                'order_id' => 1,
                'amount' => 1.5,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 'Lorem ipsum dolor ',
                'created' => '2026-04-21 18:33:02',
                'modified' => '2026-04-21 18:33:02',
            ],
        ];
        parent::init();
    }
}
