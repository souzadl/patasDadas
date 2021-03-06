<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prontuario Entity
 *
 * @property int $id_prontuario
 * @property int $apto_adocao
 * @property int $apto_avento
 * @property int $id_animal
 */
class Prontuario extends Entity
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
        'apto_adocao' => true,
        'apto_evento' => true,
        'id_animal' => true,
        'castracao' => true
    ];
}
