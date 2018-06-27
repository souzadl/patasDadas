<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FotosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FotosTable Test Case
 */
class FotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FotosTable
     */
    public $Fotos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fotos',
        'app.adotaveis',
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
        $config = TableRegistry::getTableLocator()->exists('Fotos') ? [] : ['className' => FotosTable::class];
        $this->Fotos = TableRegistry::getTableLocator()->get('Fotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fotos);

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
