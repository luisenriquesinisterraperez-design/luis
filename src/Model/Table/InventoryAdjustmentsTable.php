<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryAdjustments Model
 *
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsTo $Ingredients
 *
 * @method \App\Model\Entity\InventoryAdjustment newEmptyEntity()
 * @method \App\Model\Entity\InventoryAdjustment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InventoryAdjustment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryAdjustment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InventoryAdjustment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InventoryAdjustment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InventoryAdjustment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryAdjustment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InventoryAdjustment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InventoryAdjustment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InventoryAdjustment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InventoryAdjustment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InventoryAdjustment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InventoryAdjustment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InventoryAdjustment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InventoryAdjustment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InventoryAdjustment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InventoryAdjustmentsTable extends Table
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

        $this->setTable('inventory_adjustments');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ingredients', [
            'foreignKey' => 'ingredient_id',
            'joinType' => 'INNER',
        ]);

        // $this->addBehavior('Tenant');
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
            ->integer('ingredient_id')
            ->notEmptyString('ingredient_id');

        $validator
            ->decimal('quantity')
            ->notEmptyString('quantity');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->notEmptyString('type');

        $validator
            ->scalar('reason')
            ->maxLength('reason', 100)
            ->requirePresence('reason', 'create')
            ->notEmptyString('reason');

        $validator
            ->scalar('observations')
            ->allowEmptyString('observations');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['ingredient_id'], 'Ingredients'), ['errorField' => 'ingredient_id']);

        return $rules;
    }
}
