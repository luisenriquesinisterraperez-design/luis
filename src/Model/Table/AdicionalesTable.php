<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adicionales Model
 *
 * @method \App\Model\Entity\Adicionale newEmptyEntity()
 * @method \App\Model\Entity\Adicionale newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Adicionale> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adicionale get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Adicionale findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Adicionale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Adicionale> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adicionale|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Adicionale saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Adicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adicionale>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adicionale> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adicionale>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adicionale>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adicionale> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdicionalesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('adicionales');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
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
}
