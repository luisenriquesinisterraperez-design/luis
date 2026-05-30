<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderProductSalsas Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\ProductSalsasTable&\Cake\ORM\Association\BelongsTo $ProductSalsas
 *
 * @method \App\Model\Entity\OrderProductSalsa newEmptyEntity()
 * @method \App\Model\Entity\OrderProductSalsa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\OrderProductSalsa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderProductSalsa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\OrderProductSalsa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\OrderProductSalsa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\OrderProductSalsa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderProductSalsa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\OrderProductSalsa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\OrderProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderProductSalsa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderProductSalsa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderProductSalsa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderProductSalsa> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrderProductSalsasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('order_product_salsas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductSalsas', [
            'foreignKey' => 'product_salsa_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('order_id')
            ->notEmptyString('order_id');

        $validator
            ->integer('product_salsa_id')
            ->notEmptyString('product_salsa_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['order_id'], 'Orders'), ['errorField' => 'order_id']);
        $rules->add($rules->existsIn(['product_salsa_id'], 'ProductSalsas'), ['errorField' => 'product_salsa_id']);

        return $rules;
    }
}
