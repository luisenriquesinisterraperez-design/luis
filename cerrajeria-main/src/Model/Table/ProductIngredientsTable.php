<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductIngredients Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsTo $Ingredients
 *
 * @method \App\Model\Entity\ProductIngredient newEmptyEntity()
 * @method \App\Model\Entity\ProductIngredient newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProductIngredient> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductIngredient get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProductIngredient findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProductIngredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProductIngredient> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductIngredient|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProductIngredient saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProductIngredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductIngredient>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductIngredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductIngredient> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductIngredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductIngredient>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductIngredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductIngredient> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProductIngredientsTable extends Table
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

        $this->setTable('product_ingredients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('ingredient_id')
            ->notEmptyString('ingredient_id');

        $validator
            ->decimal('quantity_required')
            ->requirePresence('quantity_required', 'create')
            ->notEmptyString('quantity_required');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['ingredient_id'], 'Ingredients'), ['errorField' => 'ingredient_id']);

        return $rules;
    }
}
