<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apadrinhamentos Model
 *
 * @method \App\Model\Entity\Apadrinhamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Apadrinhamento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Apadrinhamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Apadrinhamento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apadrinhamento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apadrinhamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Apadrinhamento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Apadrinhamento findOrCreate($search, callable $callback = null, $options = [])
 */
class ApadrinhamentosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('apadrinhamentos');
        $this->setDisplayField('id_apadrinhamento');
        $this->setPrimaryKey('id_apadrinhamento');
        
        $this->belongsTo('animais')
            ->foreignKey('id_animal');
        $this->belongsTo('padrinhos')
            ->foreignKey('id_padrinho');
        $this->belongsTo('apadrinhamentostipos')
            ->foreignKey('id_apadrinhamento_tipo');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id_apadrinhamento')
            ->allowEmpty('id_apadrinhamento', 'create');

        $validator
            ->integer('id_apadrinhamento_tipo')
            ->allowEmpty('id_apadrinhamento_tipo');

        $validator
            ->integer('id_animal')
            ->allowEmpty('id_animal');

        $validator
            ->integer('id_padrinho')
            ->allowEmpty('id_padrinho');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('id_pagseguro')
            ->maxLength('id_pagseguro', 300)
            ->allowEmpty('id_pagseguro');

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
