<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionaireReadRelationalBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionaireReadRelationalBooksTable Test Case
 */
class QuestionaireReadRelationalBooksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionaireReadRelationalBooksTable
     */
    protected $QuestionaireReadRelationalBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.QuestionaireReadRelationalBooks',
        'app.Questionnaires',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('QuestionaireReadRelationalBooks') ? [] : ['className' => QuestionaireReadRelationalBooksTable::class];
        $this->QuestionaireReadRelationalBooks = TableRegistry::getTableLocator()->get('QuestionaireReadRelationalBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->QuestionaireReadRelationalBooks);

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
