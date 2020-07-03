<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 * @property \App\Model\Table\BookCategoriesTable&\Cake\ORM\Association\BelongsTo $BookCategories
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\CreatorsTable&\Cake\ORM\Association\BelongsTo $Creators
 * @property \App\Model\Table\BookBeginTextsTable&\Cake\ORM\Association\HasMany $BookBeginTexts
 * @property \App\Model\Table\BookCharactersTable&\Cake\ORM\Association\HasMany $BookCharacters
 * @property \App\Model\Table\QuestionaireReadRelationalBooksTable&\Cake\ORM\Association\HasMany $QuestionaireReadRelationalBooks
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('BookCategories', [
            'foreignKey' => 'book_category_id',
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_code',
        ]);
        $this->belongsTo('Creators', [
            'foreignKey' => 'creator_id',
        ]);
        $this->hasMany('BookBeginTexts', [
            'foreignKey' => 'id',
        ]);
        $this->hasMany('BookCharacters', [
            'foreignKey' => 'book_id',
        ]);
        $this->hasMany('QuestionaireReadRelationalBooks', [
            'foreignKey' => 'book_id',
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->date('publication_date')
            ->allowEmptyDate('publication_date');

        $validator
            ->scalar('country_code')
            ->maxLength('country_code', 2)
            ->allowEmptyString('country_code');

        $validator
            ->scalar('e_name')
            ->maxLength('e_name', 50);

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
        $rules->add($rules->existsIn(['book_category_id'], 'BookCategories'));
        $rules->add($rules->existsIn(['country_code'], 'Countries'));
        $rules->add($rules->existsIn(['creator_id'], 'Creators'));

        return $rules;
    }
}
