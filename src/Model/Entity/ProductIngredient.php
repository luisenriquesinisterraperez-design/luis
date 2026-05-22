<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductIngredient Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $ingredient_id
 * @property string $quantity_required
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Ingredient $ingredient
 */
class ProductIngredient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'product_id' => true,
        'ingredient_id' => true,
        'quantity_required' => true,
        'product' => true,
        'ingredient' => true,
    ];
}
