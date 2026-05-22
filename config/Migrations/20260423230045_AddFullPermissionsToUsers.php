<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddFullPermissionsToUsers extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('manage_products', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_orders', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_delivery_drivers', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_clients', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_inventory', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_recipes', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_accounts_receivable', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('manage_daily_closures', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('can_delete_records', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'manage_products',
        
            ], [
            'name' => 'BY_MANAGE_PRODUCTS',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_orders',
        
            ], [
            'name' => 'BY_MANAGE_ORDERS',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_delivery_drivers',
        
            ], [
            'name' => 'BY_MANAGE_DELIVERY_DRIVERS',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_clients',
        
            ], [
            'name' => 'BY_MANAGE_CLIENTS',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_inventory',
        
            ], [
            'name' => 'BY_MANAGE_INVENTORY',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_recipes',
        
            ], [
            'name' => 'BY_MANAGE_RECIPES',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_accounts_receivable',
        
            ], [
            'name' => 'BY_MANAGE_ACCOUNTS_RECEIVABLE',
            'unique' => false,
        ]);
        $table->addIndex([
            'manage_daily_closures',
        
            ], [
            'name' => 'BY_MANAGE_DAILY_CLOSURES',
            'unique' => false,
        ]);
        $table->addIndex([
            'can_delete_records',
        
            ], [
            'name' => 'BY_CAN_DELETE_RECORDS',
            'unique' => false,
        ]);
        $table->update();
    }
}
