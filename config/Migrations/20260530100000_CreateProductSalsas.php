<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateProductSalsas extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('product_salsas');
        $table->addColumn('product_id', 'integer', [
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
        $table->addColumn('modified', 'datetime', [
            'null' => true,
            'default' => null,
        ]);
        $table->addForeignKey('product_id', 'products', 'id', [
            'delete' => 'CASCADE',
            'update' => 'NO_ACTION',
        ]);
        $table->create();
    }
}
