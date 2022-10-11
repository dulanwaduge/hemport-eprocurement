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
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductTable extends Table
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

        $this->setTable('product');
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 64)
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');



        $validator
            ->numeric('price','Please enter valid price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('description')
            ->maxLength('description', 64,'The description is too long')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');


        $validator
            ->integer('amount','please enter valid amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->allowEmptyFile('image_file')
            ->add('image_file',[
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
            ->scalar('image1des')
            ->maxLength('image1des', 255)
            ->allowEmptyString('image1des');

        $validator
            ->allowEmptyFile('image_file2')
            ->add('image_file2',[
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
            ->scalar('image2des')
            ->maxLength('image2des', 255)
            ->allowEmptyString('image2des');

        $validator
            ->allowEmptyFile('image_file3')
            ->add('image_file3',[
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
            ->scalar('image3des')
            ->maxLength('image3des', 255)
            ->allowEmptyString('image3des');

        $validator
            ->allowEmptyFile('image_file4')
            ->add('image_file4',[
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
            ->scalar('image4des')
            ->maxLength('image4des', 255)
            ->allowEmptyString('image4des');

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
