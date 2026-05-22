<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAccountsReceivable extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('accounts_receivable');
        $table->addColumn('client_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('order_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('status', 'string', [
            'default' => 'pendiente',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
