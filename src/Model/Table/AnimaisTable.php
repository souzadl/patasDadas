<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Animais Model
 *
 * @method \App\Model\Entity\Animai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Animai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Animai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Animai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Animai|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Animai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Animai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Animai findOrCreate($search, callable $callback = null, $options = [])
 */
class AnimaisTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('animais');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id_animal');

        $this->belongsTo('padrinhos')
            ->setForeignKey('padrinho_racao')
            ->bindingKey('id_padrinho');

        $this->belongsTo('padrinhos')
            ->setForeignKey('padrinho_castracao')
            ->bindingKey('id_padrinho');

        $this->belongsTo('padrinhos')
            ->setForeignKey('padrinho_vacinas')
            ->bindingKey('id_padrinho');

        $this->belongsTo('padrinhos')
            ->setForeignKey('padrinho_pulgas')
            ->bindingKey('id_padrinho');
        
        $this->hasOne('prontuarios')
            ->setForeignKey('id_animal');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id_animal')
            ->allowEmpty('id_animal', 'create');

        $validator
            ->dateTime('data_cadastro')
            ->allowEmpty('data_cadastro');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 45)
            ->notEmpty('tipo');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome')
            ->add('nome', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Nome já cadastrado para outro adotável.']);

        $validator
            ->date('data_nascimento')
            ->notEmpty('data_nascimento');

        $validator
            ->date('data_aparicao')
            ->allowEmpty('data_aparicao');

        $validator
            ->scalar('local_aparicao')
            ->maxLength('local_aparicao', 300)
            ->allowEmpty('local_aparicao');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 1)
            ->notEmpty('sexo');

        $validator
            ->scalar('porte')
            ->maxLength('porte', 45)
            ->notEmpty('porte');

        $validator
            ->scalar('pelagem')
            ->maxLength('pelagem', 45)
            ->allowEmpty('pelagem');

        $validator
            ->scalar('condicao')
            ->maxLength('condicao', 45)
            ->allowEmpty('condicao');

        $validator
            ->date('data_condicao')
            ->allowEmpty('data_condicao');

        $validator
            ->date('data_castracao')
            ->allowEmpty('data_castracao');

        $validator
            ->date('data_vacinacao')
            ->allowEmpty('data_vacinacao');

        $validator
            ->date('data_vermifugacao')
            ->allowEmpty('data_vermifugacao');

        $validator
            ->scalar('temperamento')
            ->allowEmpty('temperamento');

        $validator
            ->scalar('observacao')
            ->allowEmpty('observacao');

        $validator
            ->scalar('observacao_privada')
            ->allowEmpty('observacao_privada');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 300)
            ->allowEmpty('foto');

        $validator
            ->scalar('tratamento')
            ->allowEmpty('tratamento');

        $validator
            ->scalar('perfil_facebook')
            ->maxLength('perfil_facebook', 300)
            ->allowEmpty('perfil_facebook');

        $validator
            ->scalar('perfil_instagram')
            ->maxLength('perfil_instagram', 300)
            ->allowEmpty('perfil_instagram');

        $validator
            ->scalar('album_facebook')
            ->maxLength('album_facebook', 500)
            ->allowEmpty('album_facebook');

        $validator
            ->integer('padrinho_racao')
            ->allowEmpty('padrinho_racao');

        $validator
            ->integer('padrinho_castracao')
            ->allowEmpty('padrinho_castracao');

        $validator
            ->integer('padrinho_vacinas')
            ->allowEmpty('padrinho_vacinas');

        $validator
            ->integer('padrinho_pulgas')
            ->allowEmpty('padrinho_pulgas');

        $validator
            ->scalar('check_castrado')
            ->maxLength('check_castrado', 1)
            ->allowEmpty('check_castrado');

        $validator
            ->scalar('check_vermifugado')
            ->maxLength('check_vermifugado', 1)
            ->allowEmpty('check_vermifugado');

        $validator
            ->scalar('check_vacinado')
            ->maxLength('check_vacinado', 1)
            ->allowEmpty('check_vacinado');

        return $validator;
    }

    
    public function findByCondicao($query, array $options){
        $query
            ->where(['Animais.condicao' => $options['condicao']]);
        return $query; 
    }


}
