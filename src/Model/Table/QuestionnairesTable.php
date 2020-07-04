<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionnaires Model
 * @property \App\Model\Table\QuestionaireReadRelationalBooksTable&\Cake\ORM\Association\HasMany $QuestionaireReadRelationalBooks
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
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

        $this->hasMany('QuestionaireReadRelationalBooks');
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'answerer_gender_code',
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['book_id'], 'Books'));
        $rules->add($rules->existsIn(['answerer_gender_code'], 'Genders'));

        return $rules;
    }
}
