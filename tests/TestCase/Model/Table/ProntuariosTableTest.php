<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProntuariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProntuariosTable Test Case
 */
class ProntuariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProntuariosTable
     */
    public $Prontuarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prontuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Prontuarios') ? [] : ['className' => ProntuariosTable::class];
        $this->Prontuarios = TableRegistry::getTableLocator()->get('Prontuarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prontuarios);

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
