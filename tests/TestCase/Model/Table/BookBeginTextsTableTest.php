<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookBeginTextsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookBeginTextsTable Test Case
 */
class BookBeginTextsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookBeginTextsTable
     */
    protected $BookBeginTexts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BookBeginTexts',
        'app.Books',
        'app.BookBeginTextRubies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BookBeginTexts') ? [] : ['className' => BookBeginTextsTable::class];
        $this->BookBeginTexts = TableRegistry::getTableLocator()->get('BookBeginTexts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BookBeginTexts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
