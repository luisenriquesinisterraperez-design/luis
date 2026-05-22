<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class MakeLuisSuperAdmin extends BaseMigration
{
    public function up()
    {
        $this->execute("UPDATE users SET is_superadmin = 1, role = 'admin' WHERE id = 2");
    }

    public function down() { }
}
