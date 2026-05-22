<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddPermissionsToUsers extends BaseMigration
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
        $table->addColumn('view_finances', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('view_expenses', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('view_inventory_adjustments', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('view_users', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'view_finances',
        
            ], [
            'name' => 'BY_VIEW_FINANCES',
            'unique' => false,
        ]);
        $table->addIndex([
            'view_expenses',
        
            ], [
            'name' => 'BY_VIEW_EXPENSES',
            'unique' => false,
        ]);
        $table->addIndex([
            'view_inventory_adjustments',
        
            ], [
            'name' => 'BY_VIEW_INVENTORY_ADJUSTMENTS',
            'unique' => false,
        ]);
        $table->addIndex([
            'view_users',
        
            ], [
            'name' => 'BY_VIEW_USERS',
            'unique' => false,
        ]);
        $table->update();
    }
}
