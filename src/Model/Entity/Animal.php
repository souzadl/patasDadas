<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Animai Entity
 *
 * @property int $id_animal
 * @property \Cake\I18n\FrozenTime $data_cadastro
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $tipo
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property \Cake\I18n\FrozenDate $data_aparicao
 * @property string $local_aparicao
 * @property string $sexo
 * @property string $porte
 * @property string $pelagem
 * @property string $condicao
 * @property \Cake\I18n\FrozenDate $data_condicao
 * @property \Cake\I18n\FrozenDate $data_castracao
 * @property \Cake\I18n\FrozenDate $data_vacinacao
 * @property \Cake\I18n\FrozenDate $data_vermifugacao
 * @property string $temperamento
 * @property string $observacao
 * @property string $observacao_privada
 * @property string $foto
 * @property string $tratamento
 * @property string $perfil_facebook
 * @property string $perfil_instagram
 * @property string $album_facebook
 * @property int $padrinho_racao
 * @property int $padrinho_castracao
 * @property int $padrinho_vacinas
 * @property int $padrinho_pulgas
 * @property string $check_castrado
 * @property string $check_vermifugado
 * @property string $check_vacinado
 */
class Animal extends Entity
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
        'data_cadastro' => true,
        'data_alteracao' => true,
        'tipo' => true,
        'nome' => true,
        'data_nascimento' => true,
        'filhote' => true,
        'data_aparicao' => true,
        'local_aparicao' => true,
        'sexo' => true,
        'porte' => true,
        'pelagem' => true,
        'condicao' => true,
        'data_condicao' => true,
        'data_castracao' => true,
        'data_vacinacao' => true,
        'data_vermifugacao' => true,
        'temperamento' => true,
        'observacao' => true,
        'observacao_privada' => true,
        'foto' => true,
        'tratamento' => true,
        'perfil_facebook' => true,
        'perfil_instagram' => true,
        'album_facebook' => true,
        'padrinho_racao' => true,
        'padrinho_castracao' => true,
        'padrinho_vacinas' => true,
        'padrinho_pulgas' => true,
        'check_castrado' => true,
        'check_vermifugado' => true,
        'check_vacinado' => true,
        'prontuarios' => true
    ];
    
}
