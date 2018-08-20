<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosCategoriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosCategoriasTable Test Case
 */
class ProdutosCategoriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosCategoriasTable
     */
    public $ProdutosCategorias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos_categorias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProdutosCategorias') ? [] : ['className' => ProdutosCategoriasTable::class];
        $this->ProdutosCategorias = TableRegistry::getTableLocator()->get('ProdutosCategorias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosCategorias);

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
