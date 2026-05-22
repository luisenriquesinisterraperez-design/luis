<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateCompaniesAndBranches extends BaseMigration
{
    public function change(): void
    {
        // 1. Tabla de Empresas
        $table = $this->table('companies');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('nit', 'string', ['limit' => 100, 'null' => false])
              ->addColumn('address', 'text', ['null' => true])
              ->addColumn('phone', 'string', ['limit' => 50, 'null' => true])
              ->addColumn('email', 'string', ['limit' => 255, 'null' => true])
              ->addColumn('logo', 'string', ['limit' => 255, 'null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

        // 2. Tabla de Sucursales
        $branches = $this->table('branches');
        $branches->addColumn('company_id', 'integer', ['null' => false])
                 ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
                 ->addColumn('address', 'text', ['null' => true])
                 ->addColumn('phone', 'string', ['limit' => 50, 'null' => true])
                 ->addColumn('created', 'datetime')
                 ->addColumn('modified', 'datetime')
                 ->addIndex(['company_id'])
                 ->create();
    }
}
