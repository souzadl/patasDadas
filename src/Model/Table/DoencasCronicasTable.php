<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoencasCronicas Model
 *
 * @method \App\Model\Entity\DoencasCronica get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoencasCronica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoencasCronica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoencasCronica|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoencasCronica|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoencasCronica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoencasCronica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoencasCronica findOrCreate($search, callable $callback = null, $options = [])
 */
class DoencasCronicasTable extends Table
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

        $this->setTable('doencas_cronicas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 200)
            ->allowEmpty('descricao');

        $validator
            ->integer('prontuario_id')
            ->requirePresence('prontuario_id', 'create')
            ->notEmpty('prontuario_id');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'patasdadaslegado';
    }
}
