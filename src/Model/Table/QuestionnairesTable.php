<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionnaires Model
 *
 * @method \App\Model\Entity\Questionnaire newEmptyEntity()
 * @method \App\Model\Entity\Questionnaire newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionnaire findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Questionnaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuestionnairesTable extends Table
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

        $this->setTable('questionnaires');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('impression')
            ->requirePresence('impression', 'create')
            ->notEmptyString('impression');

        $validator
            ->boolean('is_read')
            ->notEmptyString('is_read');

        $validator
            ->scalar('know_trigger')
            ->maxLength('know_trigger', 50)
            ->notEmptyString('know_trigger');

        $validator
            ->scalar('answerer_gender_code')
            ->maxLength('answerer_gender_code', 1)
            ->allowEmptyString('answerer_gender_code');

        return $validator;
    }
}
