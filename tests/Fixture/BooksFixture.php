<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '名前', 'precision' => null],
        'book_category_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '種類id', 'precision' => null, 'autoIncrement' => null],
        'creator_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '著者id', 'precision' => null, 'autoIncrement' => null],
        'publication_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '発行日', 'precision' => null],
        'country_code' => ['type' => 'char', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '国コード', 'precision' => null],
        '_indexes' => [
            'test_idx' => ['type' => 'index', 'columns' => ['book_category_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'test' => ['type' => 'foreign', 'columns' => ['book_category_id'], 'references' => ['book_categories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'name' => 'Lorem ipsum dolor sit amet',
                'book_category_id' => 1,
                'creator_id' => 1,
                'publication_date' => '2020-07-02',
                'country_code' => '',
            ],
        ];
        parent::init();
    }
}
