<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\FarmerTable&\Cake\ORM\Association\HasMany $Farmer
 * @property \App\Model\Table\ManufacturesTable&\Cake\ORM\Association\HasMany $Manufactures
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Farmer', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Manufactures', [
            'foreignKey' => 'user_id',
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
            ->scalar('type')
            ->maxLength('type', 64)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('username')
            ->maxLength('username', 64)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')

            ->add('username', 'validFormat', [
                'rule' => 'email',
                'message' => 'Username must be a valid email.'
            ]);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmptyString('password')

            ->add('password', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Password must have at least 10 characters.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 32],
                    'message' => 'Password cannot be more than 32 characters.'
                ],
                    'custom'=>['rule'=>[$this,'customFun'],'message'=> 'Password must contain at least one number, one upper case letter, and one lower case letter.']
            ]

        );

        $validator
            ->sameAs('retype_password', 'password', 'Password match failed. Please retype.');

        $validator
            ->dateTime('createtime')
            ->notEmptyDateTime('createtime');

        $validator
            ->dateTime('modifiedate')
            ->notEmptyDateTime('modifiedate');


        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('industry')
            ->maxLength('industry', 255)
            ->requirePresence('industry', 'create')
            ->notEmptyString('industry');

        $validator
            ->scalar('ABN')
            ->maxLength('ABN', 11)
            ->requirePresence('ABN', 'create')
            ->notEmptyString('ABN');
        $validator
            ->scalar('ABN')
            ->requirePresence('ABN', 'create')
            ->notEmptyString('ABN')

            ->add('ABN', [
                    'length' => [
                        'rule' => ['minLength', 11],
                        'message' => 'incorrect ABN format'
                    ],
                    'numbersonly' => [
                        "rule" => array('custom', '/^[0-9]+$/'),
                        'message' => 'Please enter using only numbers.'
                    ],
                ]

            );
        return $validator;
    }

    public function customFun($value)
    {
        $count = 0;
        if(preg_match("/[0-9]+/",$value)){
            $count++;
        }
        if(preg_match("/[a-z]+/",$value)){
            $count++;
        }
        if(preg_match("/[A-Z]+/",$value)){
            $count++;
        }
        return $count==3;
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
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);

        return $rules;
    }
}
