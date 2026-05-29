<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class FixUserTenancyNulls extends BaseMigration
{
    public function up()
    {
        $this->execute("ALTER TABLE users MODIFY company_id INT NULL");
        $this->execute("ALTER TABLE users MODIFY branch_id INT NULL");
    }

    public function down() { }
}
