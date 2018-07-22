<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlteracoesSaudesObservacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlteracoesSaudesObservacoesTable Test Case
 */
class AlteracoesSaudesObservacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlteracoesSaudesObservacoesTable
     */
    public $AlteracoesSaudesObservacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alteracoes_saudes_observacoes',
        'app.alteracoes_saudes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AlteracoesSaudesObservacoes') ? [] : ['className' => AlteracoesSaudesObservacoesTable::class];
        $this->AlteracoesSaudesObservacoes = TableRegistry::getTableLocator()->get('AlteracoesSaudesObservacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlteracoesSaudesObservacoes);

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
