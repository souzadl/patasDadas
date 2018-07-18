<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeficienciasFisicasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeficienciasFisicasTable Test Case
 */
class DeficienciasFisicasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeficienciasFisicasTable
     */
    public $DeficienciasFisicas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deficiencias_fisicas',
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
        $config = TableRegistry::getTableLocator()->exists('DeficienciasFisicas') ? [] : ['className' => DeficienciasFisicasTable::class];
        $this->DeficienciasFisicas = TableRegistry::getTableLocator()->get('DeficienciasFisicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeficienciasFisicas);

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
