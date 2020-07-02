<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountriesFixture
 */
class CountriesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'code' => ['type' => 'char', 'length' => 2, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '国コード', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_unicode_ci', 'comment' => '名前', 'precision' => null],
        'name_e' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => '', 'collate' => 'utf8mb4_unicode_ci', 'comment' => '名前(英字)', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['code'], 'length' => []],
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
                'code' => '',
                'name' => 'Lorem ipsum dolor sit amet',
                'name_e' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
