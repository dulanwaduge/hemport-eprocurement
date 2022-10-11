<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use http\Message;

/**
 * Product Model
 *
 * @method \App\Model\Entity\Demand newEmptyEntity()
 * @method \App\Model\Entity\Demand newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Demand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Demand get($primaryKey, $options = [])
 * @method \App\Model\Entity\Demand findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Demand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Demand[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Demand|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demand saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DemandTable extends Table
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

        $this->setTable('demand');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

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
            ->scalar('demand')
            ->maxLength('demand', 64)
            ->requirePresence('demand', 'create')
            ->notEmptyString('demand');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 64)
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('description')
            ->maxLength('description', 255,'The description is too long')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->allowEmptyFile('image1')
            ->add('image1',[
                'mimeType' =>[
                    'rule'=>['mimeType',[ 'image/jpg,','image/png','image/jpeg'] ],
                    'message' => 'Please upload only jpg and png.' ,
                ],
                'fileSize' =>[
                    'rule' =>[ 'fileSize', '<=', '10MB'],
                    'message' =>'Image file size must be less than 10MB.',
                ],
            ] );

        $validator
            ->scalar('business_name')
            ->maxLength('business_name', 64)
            ->requirePresence('business_name', 'create')
            ->notEmptyString('business_name');

        $validator
            ->scalar('business_num')
            ->maxLength('business_num', 11)
            ->requirePresence('business_num', 'create')
            ->notEmptyString('business_num');

        $validator
            ->scalar('business_email')
            ->maxLength('business_email', 64)
            ->requirePresence('business_email', 'create')
            ->notEmptyString('business_email');

        $validator
            ->scalar('business_address')
            ->maxLength('business_address', 64)
            ->requirePresence('business_address', 'create')
            ->notEmptyString('business_address');

        $validator
            ->scalar('city')
            ->maxLength('city', 32)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 32)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 4)
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode');

        $validator
            ->scalar('ABN')
            ->maxLength('ABN', 11)
            ->requirePresence('ABN', 'create')
            ->notEmptyString('ABN');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

}
