<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CleanDuplicateIngredients extends BaseMigration
{
    public function up()
    {
        // 1. Obtener todos los ingredientes
        $rows = $this->fetchAll("SELECT * FROM ingredients ORDER BY id ASC");
        $seen = [];
        $idsToDelete = [];

        foreach ($rows as $row) {
            $name = trim(strtolower($row['name']));
            if (isset($seen[$name])) {
                // Sumar stock al primero que encontramos
                $originalId = $seen[$name];
                $this->execute("UPDATE ingredients SET stock = stock + {$row['stock']} WHERE id = {$originalId}");
                $idsToDelete[] = $row['id'];
            } else {
                $seen[$name] = $row['id'];
            }
        }

        // 2. Borrar duplicados si existen
        if (!empty($idsToDelete)) {
            $ids = implode(',', $idsToDelete);
            $this->execute("DELETE FROM ingredients WHERE id IN ($ids)");
        }

        // 3. Forzar índice único para que no vuelva a pasar
        $this->table('ingredients')
            ->addIndex(['name'], ['unique' => true, 'name' => 'UI_INGREDIENT_NAME'])
            ->update();
    }

    public function down() { }
}
