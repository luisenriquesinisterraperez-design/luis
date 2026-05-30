<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adicionale Entity
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class Adicionale extends Entity
{
    protected array $_accessible = [
        'name' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
    ];
}
