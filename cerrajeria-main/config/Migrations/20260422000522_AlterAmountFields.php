<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AlterAmountFields extends BaseMigration
{
    public function change(): void
    {
        $table1 = $this->table('account_payments');
        $table1->changeColumn('amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ])->update();

        $table2 = $this->table('accounts_receivable');
        $table2->changeColumn('amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ])->update();
    }
}
