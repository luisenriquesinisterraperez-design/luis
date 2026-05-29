<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class FixOrderLogsConstraint extends BaseMigration
{
    public function up(): void
    {
        $table = $this->table('order_logs');
        $table->changeColumn('order_id', 'integer', [
            'null' => true,
            'default' => null
        ])->update();
    }

    public function down(): void
    {
        $table = $this->table('order_logs');
        $table->changeColumn('order_id', 'integer', [
            'null' => false
        ])->update();
    }
}
