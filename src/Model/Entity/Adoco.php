<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adoco Entity
 *
 * @property int $id_adocao
 * @property int $id_animal
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $ip
 * @property string $user_agent
 * @property string $origem_url
 * @property string $origem_campanha
 * @property string $nome
 * @property string $email
 * @property string $telefone
 */
class Adoco extends Entity
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
        'id_animal' => true,
        'data_alteracao' => true,
        'ip' => true,
        'user_agent' => true,
        'origem_url' => true,
        'origem_campanha' => true,
        'nome' => true,
        'email' => true,
        'telefone' => true
    ];
}
