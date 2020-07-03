<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookBeginTextRubies Model
 *
 * @property \App\Model\Table\BookBeginTextsTable&\Cake\ORM\Association\BelongsTo $BookBeginTexts
 *
 * @method \App\Model\Entity\BookBeginTextRuby newEmptyEntity()
 * @method \App\Model\Entity\BookBeginTextRuby newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookBeginTextRuby[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BookBeginTextRubiesTable extends Table
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

        $this->setTable('book_begin_text_rubies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('BookBeginTexts', [
            'foreignKey' => 'book_begin_text_id',
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
            ->scalar('code')
            ->maxLength('code', 10)
            ->notEmptyString('code');

        $validator
            ->scalar('ruby')
            ->requirePresence('ruby', 'create')
            ->notEmptyString('ruby');

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
        $rules->add($rules->existsIn(['book_begin_text_id'], 'BookBeginTexts'));

        return $rules;
    }
}
