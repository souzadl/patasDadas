<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CastracoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CastracoesTable Test Case
 */
class CastracoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CastracoesTable
     */
    public $Castracoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.castracoes',
        'app.clinicas',
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
        $config = TableRegistry::getTableLocator()->exists('Castracoes') ? [] : ['className' => CastracoesTable::class];
        $this->Castracoes = TableRegistry::getTableLocator()->get('Castracoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Castracoes);

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
