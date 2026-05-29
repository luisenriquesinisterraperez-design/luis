<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddOrderGroupIdToOrders extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('orders');
        $table->addColumn('order_group_id', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 50,
            'after' => 'id'
        ])
        ->addIndex(['order_group_id'])
        ->update();
    }
}
