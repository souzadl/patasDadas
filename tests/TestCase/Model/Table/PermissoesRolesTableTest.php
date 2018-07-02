<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesRolesTable Test Case
 */
class PermissoesRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesRolesTable
     */
    public $PermissoesRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes_roles',
        'app.acoes',
        'app.controles',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissoesRoles') ? [] : ['className' => PermissoesRolesTable::class];
        $this->PermissoesRoles = TableRegistry::getTableLocator()->get('PermissoesRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissoesRoles);

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
