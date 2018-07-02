<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissoesRole Entity
 *
 * @property int $acoes_id
 * @property int $controles_id
 * @property int $roles_id
 *
 * @property \App\Model\Entity\Aco $aco
 * @property \App\Model\Entity\Controle $controle
 * @property \App\Model\Entity\Role $role
 */
class PermissoesRole extends Entity
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
        'aco' => true,
        'controle' => true,
        'role' => true
    ];
}
