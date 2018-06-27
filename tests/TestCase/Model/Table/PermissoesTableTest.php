<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesTable Test Case
 */
class PermissoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesTable
     */
    public $Permissoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes',
        'app.acoes',
        'app.controles',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Permissoes') ? [] : ['className' => PermissoesTable::class];
        $this->Permissoes = TableRegistry::getTableLocator()->get('Permissoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissoes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
