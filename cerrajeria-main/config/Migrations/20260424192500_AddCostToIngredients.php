<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddCostToIngredients extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('ingredients');
        $table->addColumn('cost', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->update();
    }
}
