<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ponto Entity
 *
 * @property int $id_ponto
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $ponto
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property string $link
 */
class Ponto extends Entity
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
        'ponto' => true,
        'endereco' => true,
        'cidade' => true,
        'estado' => true,
        'link' => true
    ];
}
