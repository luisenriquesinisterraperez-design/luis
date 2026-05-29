<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddDriverLinkToUsers extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('delivery_driver_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'delivery_driver_id',
        
            ], [
            'name' => 'BY_DELIVERY_DRIVER_ID',
            'unique' => false,
        ]);
        $table->update();
    }
}
