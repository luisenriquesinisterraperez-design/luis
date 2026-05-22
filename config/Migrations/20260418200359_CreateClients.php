<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateClients extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('clients');
        $table->addColumn('full_name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('phone', 'string', ['limit' => 20, 'null' => false])
              ->addColumn('address', 'text', ['null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}
