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
 * @method \App\Model\Entity\Quotation newEmptyEntity()
 * @method \App\Model\Entity\Quotation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quotation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quotation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quotation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quotation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quotation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quotation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quotation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quotation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quotation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotationTable extends Table
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

        $this->setTable('quotation');
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
            ->scalar('company_name')
            ->maxLength('company_name', 64)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->integer('abn')
            ->maxLength('abn', 64)
            ->requirePresence('abn', 'create')
            ->notEmptyString('abn');

        $validator
            ->scalar('email')
            ->maxLength('email', 255)
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('contact_number')
            ->maxLength('contact_number', 20)
            ->requirePresence('contact_number', 'create')
            ->notEmptyString('contact_number');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
