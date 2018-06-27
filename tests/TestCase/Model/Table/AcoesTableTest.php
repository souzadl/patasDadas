<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcoesTable Test Case
 */
class AcoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AcoesTable
     */
    public $Acoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Acoes') ? [] : ['className' => AcoesTable::class];
        $this->Acoes = TableRegistry::getTableLocator()->get('Acoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Acoes);

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
