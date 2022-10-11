<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Delivery Model
 *
 * @property \App\Model\Table\OrderplacedTable&\Cake\ORM\Association\BelongsTo $Orderplaced
 *
 * @method \App\Model\Entity\Delivery newEmptyEntity()
 * @method \App\Model\Entity\Delivery newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Delivery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Delivery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Delivery findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Delivery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Delivery[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Delivery|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Delivery saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Delivery[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Delivery[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Delivery[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Delivery[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeliveryTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('delivery');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orderplaced', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('NumberofItem')
            ->requirePresence('NumberofItem', 'create')
            ->notEmptyString('NumberofItem');

        $validator
            ->scalar('shiptype')
            ->maxLength('shiptype', 64)
            ->requirePresence('shiptype', 'create')
            ->notEmptyString('shiptype');

        $validator
            ->dateTime('startdate')
            ->requirePresence('startdate', 'create')
            ->notEmptyDateTime('startdate');

        $validator
            ->dateTime('enddate')
            ->requirePresence('enddate', 'create')
            ->notEmptyDateTime('enddate');

        $validator
            ->integer('tracknumber')
            ->requirePresence('tracknumber', 'create')
            ->notEmptyString('tracknumber');

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
        $rules->add($rules->existsIn('order_id', 'Orderplaced'), ['errorField' => 'order_id']);

        return $rules;
    }
}
