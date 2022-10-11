<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payment Model
 *
 * @method \App\Model\Entity\Payment newEmptyEntity()
 * @method \App\Model\Entity\Payment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentTable extends Table
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

        $this->setTable('payment');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
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
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('type')
            ->maxLength('type', 64)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('status')
            ->maxLength('status', 32)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('invoice')
            ->maxLength('invoice', 64)
            ->requirePresence('invoice', 'create')
            ->notEmptyString('invoice');

        $validator
            ->integer('order_id')
            ->requirePresence('order_id', 'create')
            ->notEmptyString('order_id');

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
        $rules->add($rules->existsIn('order_id', 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
