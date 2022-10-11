<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Seller Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductTable&\Cake\ORM\Association\HasMany $Product
 *
 * @method \App\Model\Entity\Seller newEmptyEntity()
 * @method \App\Model\Entity\Seller newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Seller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Seller get($primaryKey, $options = [])
 * @method \App\Model\Entity\Seller findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Seller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Seller[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Seller|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Seller saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SellerTable extends Table
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

        $this->setTable('seller');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Product', [
            'foreignKey' => 'seller_id',
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
            ->allowEmptyString('id', null, 'create')
        ;

        $validator
            ->scalar('address')
//            ->allowEmptyString('address')
            ->add('address', [
                    'maxLength' => [
                        'rule' => ['maxLength', 64],
                        'message' => 'Address cannot be too long.'
                    ],
                ]

            );

        $validator
            ->scalar('BusinessName')
//            ->allowEmptyString('BusinessName')
            ->maxLength('BusinessName', 64)
        ;


        $validator
            ->scalar('phone')
//            ->allowEmptyString('phone')
            ->add('phone', [
                    'numbersonly' => [
                        "rule" => array('custom', '/^[0-9]( ?[0-9]){8} ?[0-9]$/'),
                        'message' => 'Please enter using only numbers.'
                    ],
                    'phone-2' => array(
                        'last'       => true,
                        'rule'       => array('minLength', 10),
                        'message'    => 'Please enter a valid 10 digit phone number, without the country code.'
                    ),
                    'phone-3' => array(
                        'last'       => true,
                        'rule'       => array('maxLength', 10),
                        'message'    => 'Please enter a valid 10 digit phone number, without the country code.'
                    )
                ]
            );

        $validator
            ->email('emailaddress',false,'Please enter a valid email.')
            ->maxLength('emailaddress', 32);

        $validator
            ->scalar('bsb')
//            ->allowEmptyString('bsb')
            ->add('bsb', [
                    'numbersonly' => [
                        "rule" => array('custom', '/^[0-9]+$/'),
                        'message' => 'Please enter using only numbers.'
                    ],
                    'phone-2' => array(
                        'last'       => true,
                        'rule'       => array('minLength', 6),
                        'message'    => 'Please enter a valid 6 digit number without dashes.'
                    ),
                    'phone-3' => array(
                        'last'       => true,
                        'rule'       => array('maxLength', 6),
                        'message'    => 'Please enter a valid 6 digit number without dashes.'
                    )
                ]
            );

        $validator
            ->scalar('accountno')
//            ->allowEmptyString('accountno')
            ->add('accountno', [
                    'numbersonly' => [
                        "rule" => array('custom', '/^[0-9]+$/'),
                        'message' => 'Please enter using only numbers.'
                    ],
                    'phone-2' => array(
                        'last'       => true,
                        'rule'       => array('minLength', 6),
                        'message'    => 'You cannot have a number lesser than 6 digits in this field.'
                    ),
                    'phone-3' => array(
                        'last'       => true,
                        'rule'       => array('maxLength', 11),
                        'message'    => 'You cannot have a number more than 11 digits in this field.'
                    )
                ]
            );

        return $validator;
    }

//    public function length10($value){
//
//        return ($value<10000000000 && $value >999999999);
//    }
//
//    public function length6($value){
//
//        return ($value<1000000 && $value >99999);
//    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('users_id', 'Users'), ['errorField' => 'users_id']);

        return $rules;
    }
}
