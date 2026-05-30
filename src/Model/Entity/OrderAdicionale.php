<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderAdicionale Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $adicional_id
 * @property string $name
 * @property string $price
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Adicionale $adicional
 */
class OrderAdicionale extends Entity
{
    protected array $_accessible = [
        'order_id' => true,
        'adicional_id' => true,
        'name' => true,
        'price' => true,
        'created' => true,
        'order' => true,
        'adicional' => true,
    ];
}
