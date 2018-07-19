<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @method \App\Model\Entity\Pedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido findOrCreate($search, callable $callback = null, $options = [])
 */
class PedidosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pedidos');
        $this->setDisplayField('id_pedido');
        $this->setPrimaryKey('id_pedido');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_pedido')
            ->allowEmpty('id_pedido', 'create');

        $validator
            ->scalar('id_pagseguro')
            ->maxLength('id_pagseguro', 45)
            ->allowEmpty('id_pagseguro');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->dateTime('data_pedido')
            ->allowEmpty('data_pedido');

        $validator
            ->decimal('valor_total')
            ->allowEmpty('valor_total');

        $validator
            ->scalar('estoque_atualizado')
            ->maxLength('estoque_atualizado', 1)
            ->requirePresence('estoque_atualizado', 'create')
            ->notEmpty('estoque_atualizado');

        $validator
            ->scalar('date')
            ->maxLength('date', 300)
            ->allowEmpty('date');

        $validator
            ->scalar('code')
            ->maxLength('code', 300)
            ->allowEmpty('code');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 300)
            ->allowEmpty('reference');

        $validator
            ->scalar('type')
            ->maxLength('type', 300)
            ->allowEmpty('type');

        $validator
            ->scalar('status')
            ->maxLength('status', 300)
            ->allowEmpty('status');

        $validator
            ->scalar('lastEventDate')
            ->maxLength('lastEventDate', 300)
            ->allowEmpty('lastEventDate');

        $validator
            ->scalar('paymentMethod_type')
            ->maxLength('paymentMethod_type', 300)
            ->allowEmpty('paymentMethod_type');

        $validator
            ->scalar('paymentMethod_code')
            ->maxLength('paymentMethod_code', 300)
            ->allowEmpty('paymentMethod_code');

        $validator
            ->scalar('grossAmount')
            ->maxLength('grossAmount', 300)
            ->allowEmpty('grossAmount');

        $validator
            ->scalar('discountAmount')
            ->maxLength('discountAmount', 300)
            ->allowEmpty('discountAmount');

        $validator
            ->scalar('feeAmount')
            ->maxLength('feeAmount', 300)
            ->allowEmpty('feeAmount');

        $validator
            ->scalar('netAmount')
            ->maxLength('netAmount', 300)
            ->allowEmpty('netAmount');

        $validator
            ->scalar('escrowEndDate')
            ->maxLength('escrowEndDate', 300)
            ->allowEmpty('escrowEndDate');

        $validator
            ->scalar('installmentCount')
            ->maxLength('installmentCount', 300)
            ->allowEmpty('installmentCount');

        $validator
            ->scalar('itemCount')
            ->maxLength('itemCount', 300)
            ->allowEmpty('itemCount');

        $validator
            ->scalar('sender_name')
            ->maxLength('sender_name', 300)
            ->allowEmpty('sender_name');

        $validator
            ->scalar('sender_email')
            ->maxLength('sender_email', 300)
            ->allowEmpty('sender_email');

        $validator
            ->scalar('sender_phone')
            ->maxLength('sender_phone', 300)
            ->allowEmpty('sender_phone');

        return $validator;
    }
}
