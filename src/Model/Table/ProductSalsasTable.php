<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSalsas Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductSalsa newEmptyEntity()
 * @method \App\Model\Entity\ProductSalsa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProductSalsa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductSalsa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProductSalsa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProductSalsa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProductSalsa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSalsa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProductSalsa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductSalsa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductSalsa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductSalsa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProductSalsa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProductSalsa> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductSalsasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('product_salsas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
