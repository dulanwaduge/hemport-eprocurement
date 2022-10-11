<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderplaced Model
 *
 * @method \App\Model\Entity\Orderplaced newEmptyEntity()
 * @method \App\Model\Entity\Orderplaced newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Orderplaced[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderplaced get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderplaced findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Orderplaced patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderplaced[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderplaced|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderplaced saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orderplaced[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderplacedTable extends Table
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

        $this->setTable('orderplaced');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('Buyer', [
//            'foreignKey' => 'buyer_id',
//            'joinType' => 'INNER',
//        ]);
//        $this->belongsTo('Seller', [
//            'foreignKey' => 'seller_id',
//            'joinType' => 'INNER',
//        ]);
//        $this->belongsTo('Product', [
//            'foreignKey' => 'product_id',
//            'joinType' => 'INNER',
//        ]);
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
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('buyer_id')
            ->requirePresence('buyer_id', 'create')
            ->notEmptyString('buyer_id');

        $validator
            ->integer('seller_id')
            ->requirePresence('seller_id', 'create')
            ->notEmptyString('seller_id');

        $validator
            ->integer('product_id')
            ->requirePresence('product_id', 'create')
            ->notEmptyString('product_id');

        $validator
            ->email('buyeremail',false,'Please a valid email.')
            ->maxLength('buyeremail', 32);

        $validator
            ->scalar('buyeraddress')
            ->maxLength('buyeraddress', 64)
            ->allowEmptyString('buyeraddress');

        $validator
            ->scalar('$buyerstate')
            ->maxLength('$buyerstate', 64)
            ->allowEmptyString('$buyerstate');

        $validator
            ->integer('$buyerpostcode')
            ->add('$buyerpostcode', [
                    '$buyerpostcode'=>['rule' =>[$this,'length4'],
                        'message'=> 'Please enter a valid 4 digit post code']
                ]
            );

        $validator
            ->numeric('amount')
            ->maxLength('amount',11);

        $validator
            ->scalar('bname')
            ->maxLength('bname', 32)
            ->allowEmptyString('bname');

        $validator
            ->scalar('sname')
            ->maxLength('sname', 32)
            ->allowEmptyString('sname');
        return $validator;
    }

    public function length4($value){

        return ($value<10000 && $value >999);
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
//        $rules->add($rules->existsIn('buyer_id', 'Buyer'), ['errorField' => 'buyer_id']);
//        $rules->add($rules->existsIn('seller_id', 'Seller'), ['errorField' => 'seller_id']);
//        $rules->add($rules->existsIn('product_id', 'Product'), ['errorField' => 'product_id']);

        return $rules;
    }
}
