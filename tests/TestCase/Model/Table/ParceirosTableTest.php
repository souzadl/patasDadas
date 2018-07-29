<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParceirosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParceirosTable Test Case
 */
class ParceirosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParceirosTable
     */
    public $Parceiros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parceiros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Parceiros') ? [] : ['className' => ParceirosTable::class];
        $this->Parceiros = TableRegistry::getTableLocator()->get('Parceiros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parceiros);

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
