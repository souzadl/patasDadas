<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adotavei Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $porte
 * @property string $sexo
 * @property int $idade
 * @property bool $vacinado
 * @property bool $vermifugado
 * @property bool $castrado
 * @property string $temperamento
 * @property string $descricao_site
 * @property string $historico_medico
 * @property string $url_facebook
 * @property string $url_intagram
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property int $users_id
 * @property int $tipos_adotavel_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TiposAdotavel $tipos_adotavel
 */
class Adotavel extends Entity{

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
        'porte' => true,
        'sexo' => true,
        'idade' => true,
        'vacinado' => true,
        'vermifugado' => true,
        'castrado' => true,
        'temperamento' => true,
        'descricao_site' => true,
        'historico_medico' => true,
        'url_facebook' => true,
        'url_intagram' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'users_id' => true,
        'tipos_adotavel_id' => true,
        'user' => true,
        'tipos_adotavel' => true
    ];
}
