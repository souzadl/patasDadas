<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AlteracoesDetalhe Entity
 *
 * @property int $id
 * @property int $descricao
 * @property int $alteracoes_id
 *
 * @property \App\Model\Entity\Alteraco $alteraco
 */
class AlteracoesDetalhe extends Entity
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
        'alteracoes_id' => true,
        'alteracao' => true
    ];
}
