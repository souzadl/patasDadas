<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MudancasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MudancasTable Test Case
 */
class MudancasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MudancasTable
     */
    public $Mudancas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mudancas',
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
        $config = TableRegistry::getTableLocator()->exists('Mudancas') ? [] : ['className' => MudancasTable::class];
        $this->Mudancas = TableRegistry::getTableLocator()->get('Mudancas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mudancas);

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
