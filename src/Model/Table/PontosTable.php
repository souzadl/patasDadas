<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pontos Model
 *
 * @method \App\Model\Entity\Ponto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ponto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ponto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ponto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ponto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ponto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ponto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ponto findOrCreate($search, callable $callback = null, $options = [])
 */
class PontosTable extends Table
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

        $this->setTable('pontos');
        $this->setDisplayField('ponto');
        $this->setPrimaryKey('id_ponto');
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
            ->integer('id_ponto')
            ->allowEmpty('id_ponto', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('ponto')
            ->maxLength('ponto', 45)
            ->allowEmpty('ponto');

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
            ->scalar('link')
            ->maxLength('link', 300)
            ->allowEmpty('link');

        return $validator;
    }
}
