<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApadrinhamentosFixture
 *
 */
class ApadrinhamentosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_apadrinhamento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_apadrinhamento_tipo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_animal' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_padrinho' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_alteracao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'id_pagseguro' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'code' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'reference' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'type' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastEventDate' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'paymentMethod_type' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'paymentMethod_code' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'grossAmount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'discountAmount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'feeAmount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'netAmount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'escrowEndDate' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'installmentCount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'itemCount' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sender_name' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sender_email' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sender_phone' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'tipo-apadrinhamento_idx' => ['type' => 'index', 'columns' => ['id_apadrinhamento_tipo'], 'length' => []],
            'animal-padrinho_idx' => ['type' => 'index', 'columns' => ['id_animal'], 'length' => []],
            'padrinho-apadrinhamento_idx' => ['type' => 'index', 'columns' => ['id_padrinho'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_apadrinhamento'], 'length' => []],
            'animal-padrinho' => ['type' => 'foreign', 'columns' => ['id_animal'], 'references' => ['animais', 'id_animal'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'padrinho-apadrinhamento' => ['type' => 'foreign', 'columns' => ['id_padrinho'], 'references' => ['padrinhos', 'id_padrinho'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'tipo-apadrinhamento' => ['type' => 'foreign', 'columns' => ['id_apadrinhamento_tipo'], 'references' => ['apadrinhamentos_tipos', 'id_apadrinhamento_tipo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
                'id_apadrinhamento' => 1,
                'id_apadrinhamento_tipo' => 1,
                'id_animal' => 1,
                'id_padrinho' => 1,
                'data_alteracao' => '2018-07-18 23:53:44',
                'id_pagseguro' => 'Lorem ipsum dolor sit amet',
                'date' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'reference' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'lastEventDate' => 'Lorem ipsum dolor sit amet',
                'paymentMethod_type' => 'Lorem ipsum dolor sit amet',
                'paymentMethod_code' => 'Lorem ipsum dolor sit amet',
                'grossAmount' => 'Lorem ipsum dolor sit amet',
                'discountAmount' => 'Lorem ipsum dolor sit amet',
                'feeAmount' => 'Lorem ipsum dolor sit amet',
                'netAmount' => 'Lorem ipsum dolor sit amet',
                'escrowEndDate' => 'Lorem ipsum dolor sit amet',
                'installmentCount' => 'Lorem ipsum dolor sit amet',
                'itemCount' => 'Lorem ipsum dolor sit amet',
                'sender_name' => 'Lorem ipsum dolor sit amet',
                'sender_email' => 'Lorem ipsum dolor sit amet',
                'sender_phone' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
