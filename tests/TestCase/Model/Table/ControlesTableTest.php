<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ControlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ControlesTable Test Case
 */
class ControlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ControlesTable
     */
    public $Controles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Controles') ? [] : ['className' => ControlesTable::class];
        $this->Controles = TableRegistry::getTableLocator()->get('Controles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Controles);

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
