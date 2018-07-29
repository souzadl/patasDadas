<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parceiros Model
 *
 * @method \App\Model\Entity\Parceiro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parceiro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parceiro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parceiro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parceiro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parceiro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parceiro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parceiro findOrCreate($search, callable $callback = null, $options = [])
 */
class ParceirosTable extends Table
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

        $this->setTable('parceiros');
        $this->setDisplayField('id_parceiro');
        $this->setPrimaryKey('id_parceiro');
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
            ->integer('id_parceiro')
            ->allowEmpty('id_parceiro', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->allowEmpty('nome');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 300)
            ->allowEmpty('logo');

        $validator
            ->scalar('link')
            ->maxLength('link', 500)
            ->allowEmpty('link');

        return $validator;
    }
}
