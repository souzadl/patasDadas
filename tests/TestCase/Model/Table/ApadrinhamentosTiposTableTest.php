<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApadrinhamentosTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApadrinhamentosTiposTable Test Case
 */
class ApadrinhamentosTiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApadrinhamentosTiposTable
     */
    public $ApadrinhamentosTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.apadrinhamentos_tipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ApadrinhamentosTipos') ? [] : ['className' => ApadrinhamentosTiposTable::class];
        $this->ApadrinhamentosTipos = TableRegistry::getTableLocator()->get('ApadrinhamentosTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApadrinhamentosTipos);

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
}
