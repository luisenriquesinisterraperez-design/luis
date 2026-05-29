<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddHasBranchesToCompanies extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('companies');
        $table->addColumn('has_branches', 'boolean', [
            'default' => false,
            'null' => false,
            'after' => 'name'
        ])
        ->update();
    }
}
