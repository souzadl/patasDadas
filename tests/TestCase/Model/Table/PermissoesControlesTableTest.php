<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesControlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesControlesTable Test Case
 */
class PermissoesControlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesControlesTable
     */
    public $PermissoesControles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes_controles',
        'app.acoes',
        'app.controles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissoesControles') ? [] : ['className' => PermissoesControlesTable::class];
        $this->PermissoesControles = TableRegistry::getTableLocator()->get('PermissoesControles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissoesControles);

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
