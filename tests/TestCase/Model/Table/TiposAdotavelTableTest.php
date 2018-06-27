<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposAdotavelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposAdotavelTable Test Case
 */
class TiposAdotavelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposAdotavelTable
     */
    public $TiposAdotavel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipos_adotavel',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TiposAdotavel') ? [] : ['className' => TiposAdotavelTable::class];
        $this->TiposAdotavel = TableRegistry::getTableLocator()->get('TiposAdotavel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposAdotavel);

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
