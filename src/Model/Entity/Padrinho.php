<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Padrinho Entity
 *
 * @property int $id_padrinho
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $nome
 * @property string $email
 * @property string $telefone
 * @property string $cpf
 * @property string $rg
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string $facebook
 *
 * @property \App\Model\Entity\Pessoa $pessoa
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
        'data_alteracao' => true,
        'nome' => true,
        'email' => true,
        'telefone' => true,
        'cpf' => true,
        'rg' => true,
        'endereco' => true,
        'cidade' => true,
        'estado' => true,
        'cep' => true,
        'facebook' => true,
        'pessoa' => true,
        'adotavei' => true,
        'tipos_padrinho' => true,
        'user' => true
    ];
}
