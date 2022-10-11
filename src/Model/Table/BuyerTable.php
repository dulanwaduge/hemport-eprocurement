<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyer Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrderplacedTable&\Cake\ORM\Association\HasMany $Orderplaced
 *
 * @method \App\Model\Entity\Buyer newEmptyEntity()
 * @method \App\Model\Entity\Buyer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Buyer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BuyerTable extends Table
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

        $this->setTable('buyer');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Orderplaced', [
            'foreignKey' => 'buyer_id',
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
            ->scalar('fname')
            ->maxLength('fname', 64)
//            ->allowEmptyString('fname')
            ->add('fname', [
                    'lettersonly' => [
                        "rule" => array('custom', '/^[a-zA-Z\s]+$/'),
                        'message' => 'Please enter using only letters from a-z.'
                    ],
                ]
            );


        $validator
            ->scalar('lname')
            ->maxLength('lname', 64)
//            ->allowEmptyString('lname')
            ->add('lname', [
                    'lettersonly' => [
                        "rule" => array('custom', '/^[a-zA-Z\s]+$/'),
                        'message' => 'Please enter using only letters from a-z.'
                    ],
                ]
            );

        $validator
            ->scalar('address')
            ->maxLength('address', 64)
            ->allowEmptyString('address');

        $validator
            ->scalar('state')
            ->maxLength('state', 64)
            ->allowEmptyString('state')
        ;

        $validator
            ->scalar('postcode')
            ->allowEmptyString('postcode')
            ->add('postcode', [
                    'numbersonly' => [
                        "rule" => array('custom', '/^[0-9]+$/'),
                        'message' => 'Please enter using only numbers.'
                    ],
                    'postcode-2' => array(
                        'last'       => true,
                        'rule'       => array('minLength', 4),
                        'message'    => 'Please enter a valid 4 digit postcode number.'
                    ),
                    'postcode-3' => array(
                        'last'       => true,
                        'rule'       => array('maxLength', 4),
                        'message'    => 'Please enter a valid 4 digit postcode number.'
                    )
                ]
            );

        $validator
            ->email('email',false,'Please enter a valid email.')
            ->maxLength('email', 64);

        $validator
            ->scalar('phone')
            ->allowEmptyString('phone')
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

        return $validator;
    }

//    public function length10($value){
//
//        return ($value<10000000000 && $value >99999999);
//    }
//
//    public function length4($value){
//
//        return ($value<10000 && $value >999);
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
