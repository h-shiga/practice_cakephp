<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionaireReadRelationalBooks Model
 *
 * @property \App\Model\Table\QuestionnairesTable&\Cake\ORM\Association\BelongsTo $Questionnaires
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\QuestionaireReadRelationalBook newEmptyEntity()
 * @method \App\Model\Entity\QuestionaireReadRelationalBook newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionaireReadRelationalBook[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuestionaireReadRelationalBooksTable extends Table
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

        $this->setTable('questionaire_read_relational_books');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Questionnaires', [
            'foreignKey' => 'questionaire_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
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
        $rules->add($rules->existsIn(['questionaire_id'], 'Questionnaires'));
        $rules->add($rules->existsIn(['book_id'], 'Books'));

        return $rules;
    }
}
