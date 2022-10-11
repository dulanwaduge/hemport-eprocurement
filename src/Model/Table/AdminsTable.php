<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admins Model
 *
 * @method \App\Model\Entity\Admin newEmptyEntity()
 * @method \App\Model\Entity\Admin newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdminsTable extends Table
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

        $this->setTable('admins');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('page')
            ->maxLength('page', 32)
            ->requirePresence('page', 'create')
            ->notEmptyString('page');


        $validator
            ->allowEmptyFile('image_file')
            ->add('image_file',[
                'mimeType' =>[
                    'rule'=>['mimeType',[ 'image/jpg,','image/png','image/jpeg'] ],
                    'message' => 'Please upload only jpg and png.' ,
                ],
                'fileSize' =>[
                    'rule' =>[ 'fileSize', '<=', '10MB'],
                    'message' =>'Image file size must be less than 3MB.',
                ],
            ] );

        $validator
            ->allowEmptyFile('image_file2')
            ->add('image_file2',[
                'mimeType' =>[
                    'rule'=>['mimeType',[ 'image/jpg,','image/png','image/jpeg'] ],
                    'message' => 'Please upload only jpg and png.' ,
                ],
                'fileSize' =>[
                    'rule' =>[ 'fileSize', '<=', '10MB'],
                    'message' =>'Image file size must be less than 3MB.',
                ],
            ] );

        $validator
            ->scalar('text')
            ->maxLength('text', 32)
            ->requirePresence('text', 'create')
            ->notEmptyString('text');

        return $validator;
    }
}
