<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionaireReadRelationalBooksFixture
 */
class QuestionaireReadRelationalBooksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'questionaire_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'アンケートid', 'precision' => null, 'autoIncrement' => null],
        'book_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '本id', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_questionaire_read_relational_books_questionaires_idx' => ['type' => 'index', 'columns' => ['questionaire_id'], 'length' => []],
            'fk_questionaire_read_relational_books_books_idx' => ['type' => 'index', 'columns' => ['book_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_questionaire_read_relational_books_books' => ['type' => 'foreign', 'columns' => ['book_id'], 'references' => ['books', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_questionaire_read_relational_books_questionaires' => ['type' => 'foreign', 'columns' => ['questionaire_id'], 'references' => ['questionnaires', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'questionaire_id' => 1,
                'book_id' => 1,
            ],
        ];
        parent::init();
    }
}
