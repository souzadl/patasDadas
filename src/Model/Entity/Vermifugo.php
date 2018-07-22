<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vermifugo Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data_aplicacao
 * @property string $nome
 * @property int $prontuario_id
 *
 * @property \App\Model\Entity\Prontuario $prontuario
 * @property \App\Model\Entity\Animai[] $animais
 */
class Vermifugo extends Entity
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
        'data_aplicacao' => true,
        'nome' => true,
        'prontuario_id' => true,
        'prontuario' => true,
        'animais' => true
    ];
}
