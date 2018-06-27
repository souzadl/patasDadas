<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permisso Entity
 *
 * @property int $acoes_id
 * @property int $controles_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\Aco $aco
 * @property \App\Model\Entity\Controle $controle
 * @property \App\Model\Entity\User $user
 */
class Permissao extends Entity
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
        'acoes_id' => true,
        'controles_id' => true,
        'users_id' => true,
        'acao' => true,
        'controle' => true,
        'user' => true
    ];

}
