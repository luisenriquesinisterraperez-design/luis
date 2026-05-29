<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeliveryDrivers Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\DeliveryDriver newEmptyEntity()
 * @method \App\Model\Entity\DeliveryDriver newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DeliveryDriver> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDriver get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DeliveryDriver findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DeliveryDriver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DeliveryDriver> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDriver|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DeliveryDriver saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DeliveryDriver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DeliveryDriver>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DeliveryDriver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DeliveryDriver> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DeliveryDriver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DeliveryDriver>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DeliveryDriver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DeliveryDriver> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeliveryDriversTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('delivery_drivers');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        // $this->addBehavior('Tenant');

        $this->hasMany('Orders', [
            'foreignKey' => 'delivery_driver_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        return $validator;
    }
}
