<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoricosPesoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoricosPesoTable Test Case
 */
class HistoricosPesoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoricosPesoTable
     */
    public $HistoricosPeso;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historicos_peso'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HistoricosPeso') ? [] : ['className' => HistoricosPesoTable::class];
        $this->HistoricosPeso = TableRegistry::getTableLocator()->get('HistoricosPeso', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HistoricosPeso);

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
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
