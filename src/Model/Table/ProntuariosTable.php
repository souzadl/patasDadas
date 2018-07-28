<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\Validation\Validator;
use Cake\I18n\Time;

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
class ProntuariosTable extends BaseTable {
    const VALIDADE_SERESTO = 8; //MESES
    const VALIDADE_VERMIFUGO = 4; //MESES
    const VALIDADE_VACINA_ADULTO = 12; //MESES
    const VALIDADE_VACINA_FILHOTE = 21; //DIAS

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
        
        $this->belongsTo('Animais', [
            'foreignKey' => 'id_animal',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('historicospeso');
        $this->hasMany('doencascronicas');
        $this->hasMany('alimentacoesespeciais');
        $this->hasMany('deficienciasfisicas');
        $this->hasMany('medicacoes');
        $this->hasMany('serestos');
        $this->hasMany('vermifugos');
        $this->hasMany('vacinas');
        $this->hasMany('alteracoes');
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

        
    public function findByAnimal(Query $query, array $options){
        $id_animal = $options['id_animal'];
        $prontuario = $query->where(['id_animal' => $id_animal]);
        return $prontuario->first();
    }
    
    
    private function proximo($entidades, $inc, $tipo='meses'){
        $data = (count($entidades) > 0) ? end($entidades)->data_aplicacao : '';
        $proximo = new Time($data);
        if($tipo === 'meses'){
            $proximo->addMonth($inc);
        }else{
            $proximo->addDays($inc);
        }
        return $proximo;
    }
    
    public function proximoSeresto($entidades){
        return $this->proximo($entidades, ProntuariosTable::VALIDADE_SERESTO);
    }
    
    public function proximaVacina($entidades, $filhote = false){
        if($filhote){
            $data = $this->proximo($entidades, ProntuariosTable::VALIDADE_VACINA_FILHOTE, 'dias');
        }else{
            $data = $this->proximo($entidades, ProntuariosTable::VALIDADE_VACINA_ADULTO);
        }
        return $data;
    }
    
    public function proximoVermifugo($entidades){
        return $this->proximo($entidades, ProntuariosTable::VALIDADE_VERMIFUGO);
    }

}
