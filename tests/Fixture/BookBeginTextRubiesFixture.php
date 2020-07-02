<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookBeginTextRubiesFixture
 */
class BookBeginTextRubiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'book_begin_text_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '本冒頭id', 'precision' => null, 'autoIncrement' => null],
        'code' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'コード', 'precision' => null],
        'ruby' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'ルビ', 'precision' => null],
        '_indexes' => [
            'fk_begin_text_idx' => ['type' => 'index', 'columns' => ['book_begin_text_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'uk_book_begin_text_id_code' => ['type' => 'unique', 'columns' => ['book_begin_text_id', 'code'], 'length' => []],
            'fk_begin_text' => ['type' => 'foreign', 'columns' => ['book_begin_text_id'], 'references' => ['book_begin_texts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'book_begin_text_id' => 1,
                'code' => 'Lorem ip',
                'ruby' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
