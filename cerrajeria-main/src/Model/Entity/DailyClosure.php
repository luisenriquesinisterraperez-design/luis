<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DailyClosure Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $date
 * @property string $base_amount
 * @property string $expected_amount
 * @property string $actual_amount
 * @property string $difference
 * @property string|null $observations
 * @property \Cake\I18n\DateTime $created
 */
class DailyClosure extends Entity
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
        'date' => true,
        'base_amount' => true,
        'expected_amount' => true,
        'actual_amount' => true,
        'difference' => true,
        'observations' => true,
        'created' => true,
    ];
}
