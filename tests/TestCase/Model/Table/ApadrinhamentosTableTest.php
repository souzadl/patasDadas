<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApadrinhamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApadrinhamentosTable Test Case
 */
class ApadrinhamentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApadrinhamentosTable
     */
    public $Apadrinhamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.apadrinhamentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Apadrinhamentos') ? [] : ['className' => ApadrinhamentosTable::class];
        $this->Apadrinhamentos = TableRegistry::getTableLocator()->get('Apadrinhamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Apadrinhamentos);

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
