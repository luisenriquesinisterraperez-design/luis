<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAdicionales extends BaseMigration
{
    public function change(): void
    {
        $this->table('order_product_salsas')->drop()->save();
        $this->table('product_salsas')->drop()->save();

        $table = $this->table('adicionales');
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
        $table->addColumn('modified', 'datetime', [
            'null' => true,
            'default' => null,
        ]);
        $table->create();

        $pivot = $this->table('order_adicionales');
        $pivot->addColumn('order_id', 'integer', [
            'null' => false,
        ]);
        $pivot->addColumn('adicional_id', 'integer', [
            'null' => false,
        ]);
        $pivot->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $pivot->addColumn('price', 'decimal', [
            'precision' => 10,
            'scale' => 2,
            'default' => 0,
            'null' => false,
        ]);
        $pivot->addColumn('created', 'datetime', [
            'null' => true,
            'default' => null,
        ]);
        $pivot->addForeignKey('order_id', 'orders', 'id', [
            'delete' => 'CASCADE',
            'update' => 'NO_ACTION',
        ]);
        $pivot->addForeignKey('adicional_id', 'adicionales', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'NO_ACTION',
        ]);
        $pivot->create();
    }
}
