<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Midia Entity
 *
 * @property int $id_midia
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property \Cake\I18n\FrozenDate $data
 * @property string $titulo
 * @property string $imagem
 * @property string $tipo
 * @property string $link
 * @property string $arquivo
 */
class Midia extends Entity
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
        'data' => true,
        'titulo' => true,
        'imagem' => true,
        'tipo' => true,
        'link' => true,
        'arquivo' => true
    ];
}
