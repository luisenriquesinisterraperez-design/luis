<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryDriver Entity
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Order[] $orders
 */
class DeliveryDriver extends Entity
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
        'name' => true,
        'last_name' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'orders' => true,
    ];

    protected function _getFullName(): string
    {
        return ($this->name ?? '') . ' ' . ($this->last_name ?? '');
    }
}
