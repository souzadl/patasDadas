<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apadrinhamento Entity
 *
 * @property int $id_apadrinhamento
 * @property int $id_apadrinhamento_tipo
 * @property int $id_animal
 * @property int $id_padrinho
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property string $id_pagseguro
 * @property string $date
 * @property string $code
 * @property string $reference
 * @property string $type
 * @property string $status
 * @property string $lastEventDate
 * @property string $paymentMethod_type
 * @property string $paymentMethod_code
 * @property string $grossAmount
 * @property string $discountAmount
 * @property string $feeAmount
 * @property string $netAmount
 * @property string $escrowEndDate
 * @property string $installmentCount
 * @property string $itemCount
 * @property string $sender_name
 * @property string $sender_email
 * @property string $sender_phone
 */
class Apadrinhamento extends Entity
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
        'id_apadrinhamento_tipo' => true,
        'id_animal' => true,
        'id_padrinho' => true,
        'data_alteracao' => true,
        'id_pagseguro' => true,
        'date' => true,
        'code' => true,
        'reference' => true,
        'type' => true,
        'status' => true,
        'lastEventDate' => true,
        'paymentMethod_type' => true,
        'paymentMethod_code' => true,
        'grossAmount' => true,
        'discountAmount' => true,
        'feeAmount' => true,
        'netAmount' => true,
        'escrowEndDate' => true,
        'installmentCount' => true,
        'itemCount' => true,
        'sender_name' => true,
        'sender_email' => true,
        'sender_phone' => true
    ];
}
