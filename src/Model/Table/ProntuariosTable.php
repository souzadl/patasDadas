<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prontuarios Model
 *
 * @method \App\Model\Entity\Prontuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prontuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prontuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prontuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prontuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prontuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prontuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prontuario findOrCreate($search, callable $callback = null, $options = [])
 */
class ProntuariosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('prontuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->hasMany('historicospeso');
        $this->hasMany('doencascronicas');
        $this->hasMany('alimentacoesespeciais');
        $this->hasMany('deficienciasfisicas');
        $this->hasMany('medicacoes');
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
                ->allowEmpty('apto_adocao');

        $validator
                ->allowEmpty('apto_avento');

        $validator
                ->integer('id_animal')
                ->requirePresence('id_animal', 'create')
                ->notEmpty('id_animal');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName() {
        return 'patasdadaslegado';
    }
    
    public function findByAnimal(Query $query, array $options){
        $animal = $options['animal'];
        $prontuario = $query->where(['id_animal' => $animal->id_animal]);
        return $prontuario->first();
    }

}
