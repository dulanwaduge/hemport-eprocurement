<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @method \App\Model\Entity\Project newEmptyEntity()
 * @method \App\Model\Entity\Project newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('id');
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
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');


        $validator
            ->scalar('cname')
            ->maxLength('cname', 64)
            ->allowEmptyString('cname');

        $validator
            ->scalar('year')
            ->allowEmptyString('year');

        $validator
            ->scalar('country')
            ->maxLength('country', 64)
            ->allowEmptyString('country');

        $validator
            ->scalar('state')
            ->maxLength('state', 64)
            ->allowEmptyString('state');

        $validator
            ->allowEmptyFile('image_file1')
            ->add('image_file1',[
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


        return $validator;
    }
}
