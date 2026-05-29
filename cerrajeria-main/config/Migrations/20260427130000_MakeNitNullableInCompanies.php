<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class MakeNitNullableInCompanies extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('companies');
        $table->changeColumn('nit', 'string', [
            'null' => true,
            'default' => null,
            'limit' => 100
        ])
        ->update();
    }
}
