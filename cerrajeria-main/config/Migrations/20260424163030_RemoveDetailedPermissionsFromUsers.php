<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class RemoveDetailedPermissionsFromUsers extends BaseMigration
{
    public function up()
    {
        $table = $this->table('users');
        $columns = [
            'view_finances', 'view_expenses', 'view_inventory_adjustments', 'view_users',
            'manage_products', 'manage_orders', 'manage_delivery_drivers', 'manage_clients',
            'manage_inventory', 'manage_recipes', 'manage_accounts_receivable', 'manage_daily_closures',
            'can_delete_records'
        ];
        
        foreach ($columns as $column) {
            if ($table->hasColumn($column)) {
                $table->removeColumn($column);
            }
        }
        $table->update();
    }

    public function down() { }
}
