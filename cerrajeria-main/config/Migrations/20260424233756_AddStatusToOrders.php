<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddStatusToOrders extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('orders');
        $table->addColumn('status', 'string', [
            'default' => 'recibido',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('delivered_at', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
