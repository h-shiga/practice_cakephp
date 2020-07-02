<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookCharactersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookCharactersTable Test Case
 */
class BookCharactersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookCharactersTable
     */
    protected $BookCharacters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BookCharacters',
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
        $config = TableRegistry::getTableLocator()->exists('BookCharacters') ? [] : ['className' => BookCharactersTable::class];
        $this->BookCharacters = TableRegistry::getTableLocator()->get('BookCharacters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BookCharacters);

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
