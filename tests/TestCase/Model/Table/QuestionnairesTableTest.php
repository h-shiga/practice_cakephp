<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionnairesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionnairesTable Test Case
 */
class QuestionnairesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionnairesTable
     */
    protected $Questionnaires;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Questionnaires',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Questionnaires') ? [] : ['className' => QuestionnairesTable::class];
        $this->Questionnaires = TableRegistry::getTableLocator()->get('Questionnaires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Questionnaires);

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
}
