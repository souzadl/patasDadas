<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VermifugosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VermifugosTable Test Case
 */
class VermifugosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VermifugosTable
     */
    public $Vermifugos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vermifugos',
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
        $config = TableRegistry::getTableLocator()->exists('Vermifugos') ? [] : ['className' => VermifugosTable::class];
        $this->Vermifugos = TableRegistry::getTableLocator()->get('Vermifugos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vermifugos);

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
