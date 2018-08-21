<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MidiasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MidiasTable Test Case
 */
class MidiasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MidiasTable
     */
    public $Midias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.midias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Midias') ? [] : ['className' => MidiasTable::class];
        $this->Midias = TableRegistry::getTableLocator()->get('Midias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Midias);

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
