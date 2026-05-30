<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderAdicionales Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\AdicionalesTable&\Cake\ORM\Association\BelongsTo $Adicionales
 *
 * @method \App\Model\Entity\OrderAdicionale newEmptyEntity()
 * @method \App\Model\Entity\OrderAdicionale newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\OrderAdicionale> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderAdicionale get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\OrderAdicionale findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\OrderAdicionale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\OrderAdicionale> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderAdicionale|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\OrderAdicionale saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\OrderAdicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderAdicionale>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderAdicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderAdicionale> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderAdicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderAdicionale>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrderAdicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrderAdicionale> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrderAdicionalesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('order_adicionales');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Adicionales', [
            'foreignKey' => 'adicional_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('order_id')
            ->notEmptyString('order_id');

        $validator
            ->integer('adicional_id')
            ->notEmptyString('adicional_id');

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
        $rules->add($rules->existsIn(['adicional_id'], 'Adicionales'), ['errorField' => 'adicional_id']);

        return $rules;
    }
}
