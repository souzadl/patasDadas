<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnimaisGaleriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnimaisGaleriaTable Test Case
 */
class AnimaisGaleriaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnimaisGaleriaTable
     */
    public $AnimaisGaleria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.animais_galeria'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AnimaisGaleria') ? [] : ['className' => AnimaisGaleriaTable::class];
        $this->AnimaisGaleria = TableRegistry::getTableLocator()->get('AnimaisGaleria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnimaisGaleria);

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
