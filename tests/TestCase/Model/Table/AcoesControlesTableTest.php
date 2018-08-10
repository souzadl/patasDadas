<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcoesControlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcoesControlesTable Test Case
 */
class AcoesControlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AcoesControlesTable
     */
    public $AcoesControles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.acoes_controles',
        'app.controles',
        'app.acoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AcoesControles') ? [] : ['className' => AcoesControlesTable::class];
        $this->AcoesControles = TableRegistry::getTableLocator()->get('AcoesControles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AcoesControles);

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
