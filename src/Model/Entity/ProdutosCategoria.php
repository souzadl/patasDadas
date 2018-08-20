<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdutosCategoria Entity
 *
 * @property int $id_produto_categoria
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $categoria
 */
class ProdutosCategoria extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'data_alteracao' => true,
        'categoria' => true
    ];
}
