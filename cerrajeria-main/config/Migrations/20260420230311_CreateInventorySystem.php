<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateInventorySystem extends BaseMigration
{
    public function change(): void
    {
        // Tabla de materia prima
        $this->table('ingredients')
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('stock', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => 0])
            ->addColumn('unit', 'string', ['limit' => 50, 'default' => 'unidades']) // gr, ml, und
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        // Tabla de recetas (Relación Producto -> Ingrediente)
        $this->table('product_ingredients')
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('ingredient_id', 'integer', ['null' => false])
            ->addColumn('quantity_required', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE'])
            ->addForeignKey('ingredient_id', 'ingredients', 'id', ['delete' => 'RESTRICT'])
            ->create();
    }
}
