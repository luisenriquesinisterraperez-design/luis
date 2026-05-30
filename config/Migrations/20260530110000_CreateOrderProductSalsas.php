<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateOrderProductSalsas extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('order_product_salsas');
        $table->addColumn('order_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('product_salsa_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('price', 'decimal', [
            'precision' => 10,
            'scale' => 2,
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'null' => true,
            'default' => null,
        ]);
        $table->addForeignKey('order_id', 'orders', 'id', [
            'delete' => 'CASCADE',
            'update' => 'NO_ACTION',
        ]);
        $table->addForeignKey('product_salsa_id', 'product_salsas', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'NO_ACTION',
        ]);
        $table->create();
    }
}
