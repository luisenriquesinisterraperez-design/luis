<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddSuperAdminToUsers extends BaseMigration
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
        $table->addColumn('is_superadmin', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'is_superadmin',
        
            ], [
            'name' => 'BY_IS_SUPERADMIN',
            'unique' => false,
        ]);
        $table->update();
    }
}
