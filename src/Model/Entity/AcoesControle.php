<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AcoesControle Entity
 *
 * @property int $id
 * @property int $controles_id
 * @property int $acoes_id
 *
 * @property \App\Model\Entity\Controle $controle
 * @property \App\Model\Entity\Acao $acao
 */
class AcoesControle extends Entity
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
        'controles_id' => true,
        'acoes_id' => true,
        'controle' => true,
        'acao' => true
    ];
}
