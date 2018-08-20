<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id_evento
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property \Cake\I18n\FrozenDate $data
 * @property string $horario
 * @property string $local
 * @property string $evento
 * @property string $imagem
 * @property string $link
 */
class Evento extends Entity
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
        'horario' => true,
        'local' => true,
        'evento' => true,
        'imagem' => true,
        'link' => true
    ];
}
