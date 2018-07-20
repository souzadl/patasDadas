<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conteudo Entity
 *
 * @property int $id_conteudo
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $missao
 * @property string $historia
 * @property string $arquivo
 * @property string $email
 * @property string $imagem
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 */
class Conteudo extends Entity
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
        'missao' => true,
        'historia' => true,
        'arquivo' => true,
        'email' => true,
        'imagem' => true,
        'facebook' => true,
        'twitter' => true,
        'instagram' => true
    ];
}
