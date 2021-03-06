<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApadrinhamentosTipo Entity
 *
 * @property int $id_apadrinhamento_tipo
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $tipo_apadrinhamento
 * @property string $porte
 * @property string $sexo
 * @property string $tipo
 * @property float $valor
 * @property string $periodicidade
 */
class ApadrinhamentosTipo extends Entity
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
        'tipo_apadrinhamento' => true,
        'porte' => true,
        'sexo' => true,
        'tipo' => true,
        'valor' => true,
        'periodicidade' => true
    ];
}
