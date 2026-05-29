<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryAdjustment Entity
 *
 * @property int $id
 * @property int $ingredient_id
 * @property string $quantity
 * @property string $type
 * @property string $reason
 * @property string|null $observations
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\Ingredient $ingredient
 */
class InventoryAdjustment extends Entity
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
        'ingredient_id' => true,
        'quantity' => true,
        'type' => true,
        'reason' => true,
        'observations' => true,
        'created' => true,
        'ingredient' => true,
    ];
}
