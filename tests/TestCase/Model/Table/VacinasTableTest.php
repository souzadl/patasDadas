<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VacinasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VacinasTable Test Case
 */
class VacinasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VacinasTable
     */
    public $Vacinas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vacinas',
        'app.prontuarios',
        'app.animais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vacinas') ? [] : ['className' => VacinasTable::class];
        $this->Vacinas = TableRegistry::getTableLocator()->get('Vacinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vacinas);

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
