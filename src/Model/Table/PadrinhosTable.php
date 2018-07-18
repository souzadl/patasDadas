<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Padrinhos Model
 *
 * @method \App\Model\Entity\Padrinho get($primaryKey, $options = [])
 * @method \App\Model\Entity\Padrinho newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Padrinho[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padrinho|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padrinho patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho findOrCreate($search, callable $callback = null, $options = [])
 */
class PadrinhosTable extends Table
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

        $this->setTable('padrinhos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id_padrinho');
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
            ->integer('id_padrinho')
            ->allowEmpty('id_padrinho', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->allowEmpty('nome');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->allowEmpty('telefone');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 20)
            ->allowEmpty('cpf');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 20)
            ->allowEmpty('rg');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 500)
            ->allowEmpty('endereco');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 45)
            ->allowEmpty('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 2)
            ->allowEmpty('estado');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 12)
            ->allowEmpty('cep');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 300)
            ->allowEmpty('facebook');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

}
