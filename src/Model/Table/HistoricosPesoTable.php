<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoricosPeso Model
 *
 * @method \App\Model\Entity\HistoricosPeso get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoricosPeso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HistoricosPeso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoricosPeso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoricosPeso|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoricosPeso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoricosPeso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoricosPeso findOrCreate($search, callable $callback = null, $options = [])
 */
class HistoricosPesoTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('historicos_pesos');
        $this->setDisplayField('peso');
        $this->setPrimaryKey('id');
        
        $this->hasOne('prontuarios');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->date('data_afericao')
                ->requirePresence('data_afericao', 'create')
                ->notEmpty('data_afericao');

        $validator
                ->scalar('peso')
                ->maxLength('peso', 45)
                ->requirePresence('peso', 'create')
                ->notEmpty('peso');

        $validator
                ->integer('prontuario_id')
                ->requirePresence('prontuario_id', 'create')
                ->notEmpty('prontuario_id');

        return $validator;
    }


}
