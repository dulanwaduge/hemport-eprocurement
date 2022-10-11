<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Builder Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Builder newEmptyEntity()
 * @method \App\Model\Entity\Builder newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Builder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Builder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Builder findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Builder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Builder[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Builder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Builder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Builder[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Builder[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Builder[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Builder[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuilderTable extends Table
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

        $this->setTable('builder');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('name')
            ->maxLength('name', 64)
//            ->allowEmptyString('name')
            ->add('name', [
                'lettersonly' => [
                    "rule" => array('custom', '/^[a-zA-Z\s]+$/'),
                    'message' => 'Please enter using only letters from a-z.'
                     ],
                ]
            );

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
            ->email('email')
//            ->allowEmptyString('email')
            ->add('email', 'validFormat', [
            'rule' => 'email',
            'message' => 'You must enter a valid email.'
        ]);


        $validator
            ->scalar('address')
            ->maxLength('address', 64)
//            ->allowEmptyString('address')
        ;

        $validator
            ->scalar('description')
            ->maxLength('description', 255,'Description can not be too long')
//            ->allowEmptyString('description')
        ;

        $validator
            ->scalar('city')
            ->maxLength('city', 32)
//            ->allowEmptyString('city')
        ;

        $validator
            ->scalar('state')
            ->maxLength('state', 32)
//            ->allowEmptyString('state')
        ;

        $validator
            ->scalar('postcode')
//            ->allowEmptyString('postcode')
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
            ->allowEmptyFile('image_file')
            ->add('image_file',[
                'mimeType' =>[
                    'rule'=>['mimeType',[ 'image/jpg,','image/png','image/jpeg'] ],
                    'message' => 'Please upload only jpg and png.' ,
                ],
                'fileSize' =>[
                    'rule' =>[ 'fileSize', '<=', '3MB'],
                    'message' =>'Image file size must be less than 3MB.',
                ],
            ] );

        return $validator;
    }
//    public function length10($value){
//
//        return ($value<10000000000 && $value >999999999);
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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
