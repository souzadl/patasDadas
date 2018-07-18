<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnimaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnimaisTable Test Case
 */
class AnimaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnimaisTable
     */
    public $Animais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.animais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Animais') ? [] : ['className' => AnimaisTable::class];
        $this->Animais = TableRegistry::getTableLocator()->get('Animais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Animais);

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
