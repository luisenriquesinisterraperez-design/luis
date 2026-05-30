<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderProductSalsa Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_salsa_id
 * @property string $name
 * @property string $price
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\ProductSalsa $product_salsa
 */
class OrderProductSalsa extends Entity
{
    protected array $_accessible = [
        'order_id' => true,
        'product_salsa_id' => true,
        'name' => true,
        'price' => true,
        'created' => true,
        'order' => true,
        'product_salsa' => true,
    ];
}
