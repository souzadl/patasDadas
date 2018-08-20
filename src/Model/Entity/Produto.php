<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id_produto
 * @property int $id_produto_categoria
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $titulo
 * @property string $descricao
 * @property string $imagem
 * @property float $valor
 * @property string $ativo
 * @property int $peso
 * @property string $destaque
 */
class Produto extends Entity
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
        'id_produto_categoria' => true,
        'data_alteracao' => true,
        'titulo' => true,
        'descricao' => true,
        'imagem' => true,
        'valor' => true,
        'ativo' => true,
        'peso' => true,
        'destaque' => true
    ];
}
