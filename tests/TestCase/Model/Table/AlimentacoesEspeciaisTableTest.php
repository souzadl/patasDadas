<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlimentacoesEspeciaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlimentacoesEspeciaisTable Test Case
 */
class AlimentacoesEspeciaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlimentacoesEspeciaisTable
     */
    public $AlimentacoesEspeciais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alimentacoes_especiais',
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
        $config = TableRegistry::getTableLocator()->exists('AlimentacoesEspeciais') ? [] : ['className' => AlimentacoesEspeciaisTable::class];
        $this->AlimentacoesEspeciais = TableRegistry::getTableLocator()->get('AlimentacoesEspeciais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlimentacoesEspeciais);

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
