<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicacoesTable Test Case
 */
class MedicacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicacoesTable
     */
    public $Medicacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medicacoes',
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
        $config = TableRegistry::getTableLocator()->exists('Medicacoes') ? [] : ['className' => MedicacoesTable::class];
        $this->Medicacoes = TableRegistry::getTableLocator()->get('Medicacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medicacoes);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
