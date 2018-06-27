<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Padrinho Entity
 *
 * @property int $id
 * @property int $padrinho_id
 * @property int $adotaveis_id
 * @property int $tipos_padrinhos_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property int $users_id
 *
 * @property \App\Model\Entity\Padrinho[] $padrinhos
 * @property \App\Model\Entity\Adotavei $adotavei
 * @property \App\Model\Entity\TiposPadrinho $tipos_padrinho
 * @property \App\Model\Entity\User $user
 */
class Padrinho extends Entity
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
        'padrinho_id' => true,
        'adotaveis_id' => true,
        'tipos_padrinhos_id' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'users_id' => true,
        'padrinhos' => true,
        'adotavei' => true,
        'tipos_padrinho' => true,
        'user' => true
    ];
}
