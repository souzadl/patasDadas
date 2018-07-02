<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesUsersTable Test Case
 */
class PermissoesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesUsersTable
     */
    public $PermissoesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes_users',
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
        $config = TableRegistry::getTableLocator()->exists('PermissoesUsers') ? [] : ['className' => PermissoesUsersTable::class];
        $this->PermissoesUsers = TableRegistry::getTableLocator()->get('PermissoesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissoesUsers);

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
