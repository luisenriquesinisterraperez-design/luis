<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddLoginSecurityToUsers extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('failed_logins', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('lockout_time', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
