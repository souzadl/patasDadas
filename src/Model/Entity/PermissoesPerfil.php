<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissoesPerfil Entity
 *
 * @property int $id
 * @property int $perfis_id
 * @property int $acoes_controles_id
 *
 * @property \App\Model\Entity\Acao $acao
 * @property \App\Model\Entity\Controle $controle
 * @property \App\Model\Entity\Perfil $perfil
 */
class PermissoesPerfil extends Entity
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
        'perfis_id' => true,
        'acoes_controles_id' => true,
        'acao' => true,
        'controle' => true,
        'perfil' => true
    ];
}
