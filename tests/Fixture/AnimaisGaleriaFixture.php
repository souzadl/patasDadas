<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnimaisGaleriaFixture
 *
 */
class AnimaisGaleriaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'animais_galeria';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_animal_galeria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_animal' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_alteracao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'imagem' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'animal-galeria_idx' => ['type' => 'index', 'columns' => ['id_animal'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_animal_galeria'], 'length' => []],
            'animal-galeria' => ['type' => 'foreign', 'columns' => ['id_animal'], 'references' => ['animais', 'id_animal'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id_animal_galeria' => 1,
                'id_animal' => 1,
                'data_alteracao' => '2018-08-03 11:24:44',
                'imagem' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
