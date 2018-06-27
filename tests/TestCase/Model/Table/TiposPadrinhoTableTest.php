<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposPadrinhoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposPadrinhoTable Test Case
 */
class TiposPadrinhoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposPadrinhoTable
     */
    public $TiposPadrinho;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipos_padrinho',
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
        $config = TableRegistry::getTableLocator()->exists('TiposPadrinho') ? [] : ['className' => TiposPadrinhoTable::class];
        $this->TiposPadrinho = TableRegistry::getTableLocator()->get('TiposPadrinho', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposPadrinho);

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
