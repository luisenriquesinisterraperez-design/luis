<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class ClearOperationalData extends BaseMigration
{
    public function up()
    {
        // Desactivar llaves foráneas para poder vaciar tablas con relaciones
        $this->execute("SET FOREIGN_KEY_CHECKS = 0");

        $tables = [
            'order_logs',
            'account_payments',
            'accounts_receivable',
            'orders',
            'daily_closures',
            'expenses',
            'inventory_adjustments'
        ];

        foreach ($tables as $table) {
            $this->execute("TRUNCATE TABLE $table");
        }

        // Reactivar llaves foráneas
        $this->execute("SET FOREIGN_KEY_CHECKS = 1");
    }

    public function down()
    {
        // No hay vuelta atrás para un truncate masivo
    }
}
