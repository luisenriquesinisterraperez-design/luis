<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateInventoryAdjustments extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('inventory_adjustments');
        $table->addColumn('ingredient_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('quantity', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('type', 'string', [
            'default' => 'baja', // 'baja' (salida) o 'ajuste' (entrada/corrección)
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('reason', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('observations', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
