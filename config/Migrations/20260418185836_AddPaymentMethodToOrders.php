<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddPaymentMethodToOrders extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('orders');
        $table->addColumn('payment_method', 'string', [
            'limit' => 50,
            'default' => 'Efectivo',
            'null' => false,
            'after' => 'total'
        ])->update();
    }
}
