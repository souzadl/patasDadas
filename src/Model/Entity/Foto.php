<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foto Entity
 *
 * @property int $id
 * @property int $nome
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $adotaveis_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\Adotavei $adotavei
 * @property \App\Model\Entity\User $user
 */
class Foto extends Entity
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
        'nome' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'adotaveis_id' => true,
        'users_id' => true,
        'adotavei' => true,
        'user' => true
    ];
}
