<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class FixUserDriverNull extends BaseMigration
{
    public function up()
    {
        $this->execute("ALTER TABLE users MODIFY delivery_driver_id INT NULL");
    }

    public function down() { }
}
