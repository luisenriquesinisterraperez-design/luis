<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class InitialMigration extends BaseMigration
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
        $this->table('users')
            ->addColumn('username', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('role', 'string', ['limit' => 20, 'default' => 'user'])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        $this->table('products')
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('image', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('status', 'boolean', ['default' => true])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        $this->table('delivery_drivers')
            ->addColumn('name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('last_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('phone', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        $this->table('orders')
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('quantity', 'integer', ['default' => 1])
            ->addColumn('type', 'string', ['limit' => 20, 'null' => false]) // local, domicilio
            ->addColumn('shipping_cost', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => 0])
            ->addColumn('customer_name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('customer_phone', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('customer_address', 'text', ['null' => true])
            ->addColumn('delivery_driver_id', 'integer', ['null' => true])
            ->addColumn('total', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'RESTRICT', 'update' => 'CASCADE'])
            ->addForeignKey('delivery_driver_id', 'delivery_drivers', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
            ->create();

        $this->table('expenses')
            ->addColumn('description', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
            ->addColumn('date', 'date', ['null' => false])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
