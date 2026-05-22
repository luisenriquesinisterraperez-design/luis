<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class FixDecimalPrecision extends BaseMigration
{
    public function up()
    {
        $this->execute("ALTER TABLE account_payments MODIFY amount DECIMAL(15,2) NOT NULL DEFAULT 0");
        $this->execute("ALTER TABLE accounts_receivable MODIFY amount DECIMAL(15,2) NOT NULL DEFAULT 0");
    }

    public function down()
    {
        // No necesario revertir para este fix rápido
    }
}
