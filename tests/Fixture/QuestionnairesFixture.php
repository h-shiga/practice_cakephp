<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionnairesFixture
 */
class QuestionnairesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'impression' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '感想', 'precision' => null],
        'is_read' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '読んだことあるか', 'precision' => null],
        'know_trigger' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_unicode_ci', 'comment' => '知るきっかけ', 'precision' => null],
        'answerer_gender_code' => ['type' => 'char', 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '回答者性別', 'precision' => null],
        '_indexes' => [
            'test_idx' => ['type' => 'index', 'columns' => ['answerer_gender_code'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_questionnaires_answerer_genders' => ['type' => 'foreign', 'columns' => ['answerer_gender_code'], 'references' => ['genders', 'code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'impression' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_read' => 1,
                'know_trigger' => 'Lorem ipsum dolor sit amet',
                'answerer_gender_code' => '',
            ],
        ];
        parent::init();
    }
}
