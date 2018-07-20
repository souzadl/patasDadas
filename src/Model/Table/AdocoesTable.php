<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adocoes Model
 *
 * @method \App\Model\Entity\Adoco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adoco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adoco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adoco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adoco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adoco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adoco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adoco findOrCreate($search, callable $callback = null, $options = [])
 */
class AdocoesTable extends Table
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

        $this->setTable('adocoes');
        $this->setDisplayField('id_adocao');
        $this->setPrimaryKey('id_adocao');
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
            ->integer('id_adocao')
            ->allowEmpty('id_adocao', 'create');

        $validator
            ->integer('id_animal')
            ->allowEmpty('id_animal');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 45)
            ->allowEmpty('ip');

        $validator
            ->scalar('user_agent')
            ->maxLength('user_agent', 300)
            ->allowEmpty('user_agent');

        $validator
            ->scalar('origem_url')
            ->maxLength('origem_url', 300)
            ->allowEmpty('origem_url');

        $validator
            ->scalar('origem_campanha')
            ->maxLength('origem_campanha', 300)
            ->allowEmpty('origem_campanha');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 300)
            ->allowEmpty('nome');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 300)
            ->allowEmpty('telefone');

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
