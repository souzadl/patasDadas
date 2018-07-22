<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SerestosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SerestosTable Test Case
 */
class SerestosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SerestosTable
     */
    public $Serestos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.serestos',
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
        $config = TableRegistry::getTableLocator()->exists('Serestos') ? [] : ['className' => SerestosTable::class];
        $this->Serestos = TableRegistry::getTableLocator()->get('Serestos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Serestos);

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
