<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Castracao Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property int $castrado_por_patas
 * @property int $clinicas_id
 * @property int $prontuario_id
 *
 * @property \App\Model\Entity\Clinica $clinica
 * @property \App\Model\Entity\Prontuario $prontuario
 */
class Castracao extends Entity
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
        'data' => true,
        'castrado_por_patas' => true,
        'clinicas_id' => true,
        'prontuario_id' => true,
        'clinica' => true,
        'prontuario' => true
    ];
}
