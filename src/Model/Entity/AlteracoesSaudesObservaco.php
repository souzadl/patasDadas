<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AlteracoesSaudesObservaco Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property string $obs
 * @property int $alterações_saude_id
 *
 * @property \App\Model\Entity\AlteracoesSaude $alteracoes_saude
 */
class AlteracoesSaudesObservaco extends Entity
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
        'data' => true,
        'obs' => true,
        'alteracoes_saude_id' => true,
        'alteracoes_saude' => true
    ];
}
