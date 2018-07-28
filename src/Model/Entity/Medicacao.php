<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medicaco Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $uso
 * @property string $dosagem
 * @property string $frequencia
 * @property int $continuo
 * @property \Cake\I18n\FrozenDate $inicio
 * @property \Cake\I18n\FrozenDate $termino
 * @property int $prontuario_id
 *
 * @property \App\Model\Entity\Prontuario $prontuario
 */
class Medicacao extends Entity
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
        'descricao' => true,
        'uso' => true,
        'dosagem' => true,
        'frequencia' => true,
        'continuo' => true,
        'inicio' => true,
        'termino' => true,
        'prontuario_id' => true,
        'prontuario' => true
    ];
}
