<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'quantity' => 1,
                'type' => 'Lorem ipsum dolor ',
                'shipping_cost' => 1.5,
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'customer_phone' => 'Lorem ipsum dolor ',
                'customer_address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'delivery_driver_id' => 1,
                'total' => 1.5,
                'created' => '2026-04-18 15:09:38',
                'modified' => '2026-04-18 15:09:38',
            ],
        ];
        parent::init();
    }
}
