<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddMultiTenancyToAllTables extends BaseMigration
{
    public function change(): void
    {
        $tables = [
            'users', 'products', 'ingredients', 'delivery_drivers', 'clients',
            'orders', 'expenses', 'daily_closures', 'inventory_adjustments',
            'accounts_receivable', 'account_payments', 'order_logs'
        ];

        foreach ($tables as $t) {
            $table = $this->table($t);
            $table->addColumn('company_id', 'integer', ['null' => true, 'after' => 'id'])
                  ->addColumn('branch_id', 'integer', ['null' => true, 'after' => 'company_id'])
                  ->addIndex(['company_id'])
                  ->addIndex(['branch_id'])
                  ->update();
        }
    }
}
