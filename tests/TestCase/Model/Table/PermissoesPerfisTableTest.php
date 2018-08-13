<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesPerfisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesPerfisTable Test Case
 */
class PermissoesPerfisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesPerfisTable
     */
    public $PermissoesPerfis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes_perfis',
        'app.acoes',
        'app.controles',
        'app.perfis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissoesPerfis') ? [] : ['className' => PermissoesPerfisTable::class];
        $this->PermissoesPerfis = TableRegistry::getTableLocator()->get('PermissoesPerfis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissoesPerfis);

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
