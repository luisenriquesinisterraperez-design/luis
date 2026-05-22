<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateDailyClosures extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('daily_closures');
        $table->addColumn('date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('base_amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('expected_amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('actual_amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('difference', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision' => 15,
            'scale' => 2,
        ]);
        $table->addColumn('observations', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
