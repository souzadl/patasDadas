<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposPadrinhosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposPadrinhosTable Test Case
 */
class TiposPadrinhosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposPadrinhosTable
     */
    public $TiposPadrinhos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipos_padrinhos',
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
        $config = TableRegistry::getTableLocator()->exists('TiposPadrinhos') ? [] : ['className' => TiposPadrinhosTable::class];
        $this->TiposPadrinhos = TableRegistry::getTableLocator()->get('TiposPadrinhos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposPadrinhos);

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
