<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoencasCronicasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoencasCronicasTable Test Case
 */
class DoencasCronicasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoencasCronicasTable
     */
    public $DoencasCronicas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doencas_cronicas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DoencasCronicas') ? [] : ['className' => DoencasCronicasTable::class];
        $this->DoencasCronicas = TableRegistry::getTableLocator()->get('DoencasCronicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoencasCronicas);

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
