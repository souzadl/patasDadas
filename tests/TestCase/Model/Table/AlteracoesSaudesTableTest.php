<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlteracoesSaudesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlteracoesSaudesTable Test Case
 */
class AlteracoesSaudesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlteracoesSaudesTable
     */
    public $AlteracoesSaudes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alteracoes_saudes',
        'app.prontuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AlteracoesSaudes') ? [] : ['className' => AlteracoesSaudesTable::class];
        $this->AlteracoesSaudes = TableRegistry::getTableLocator()->get('AlteracoesSaudes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlteracoesSaudes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
