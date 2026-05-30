<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSalsa Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $price
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductSalsa extends Entity
{
    protected array $_accessible = [
        'product_id' => true,
        'name' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
    ];
}
