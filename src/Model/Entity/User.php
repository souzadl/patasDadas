<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int $roles_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $changed 
 *
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
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
        /*'nome' => true,
        'email' => true,*/
        'login' => true,
        'senha' => true,
        'pessoa' => true,
        'perfis_id' => true,
        'perfil' => true,
        'ativo' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'senha'
    ];
    
    protected function _setSenha($senha){
        if(strlen($senha) > 0){
            return (new DefaultPasswordHasher)->hash($senha);
        }
    }   
    
    protected function _getHash(){
        return substr($this->senha, 0, 20);
    }
    
    

    
}
