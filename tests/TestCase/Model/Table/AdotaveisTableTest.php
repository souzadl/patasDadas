<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdotaveisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdotaveisTable Test Case
 */
class AdotaveisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdotaveisTable
     */
    public $Adotaveis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adotaveis',
        'app.users',
        'app.tipos_adotaveis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Adotaveis') ? [] : ['className' => AdotaveisTable::class];
        $this->Adotaveis = TableRegistry::getTableLocator()->get('Adotaveis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adotaveis);

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
