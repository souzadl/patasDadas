<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CastracoesFixture
 *
 */
class CastracoesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'data' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'castrado_por_patas' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'clinicas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prontuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_castracoes_clinicas1_idx' => ['type' => 'index', 'columns' => ['clinicas_id'], 'length' => []],
            'fk_castracoes_prontuarios1_idx' => ['type' => 'index', 'columns' => ['prontuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_castracoes_clinicas1' => ['type' => 'foreign', 'columns' => ['clinicas_id'], 'references' => ['clinicas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_castracoes_prontuarios1' => ['type' => 'foreign', 'columns' => ['prontuario_id'], 'references' => ['prontuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'data' => '2018-07-28',
                'castrado_por_patas' => 1,
                'clinicas_id' => 1,
                'prontuario_id' => 1
            ],
        ];
        parent::init();
    }
}
