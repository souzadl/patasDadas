<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicasTable Test Case
 */
class ClinicasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicasTable
     */
    public $Clinicas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clinicas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Clinicas') ? [] : ['className' => ClinicasTable::class];
        $this->Clinicas = TableRegistry::getTableLocator()->get('Clinicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clinicas);

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
