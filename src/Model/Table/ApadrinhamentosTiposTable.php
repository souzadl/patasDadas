<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApadrinhamentosTipos Model
 *
 * @method \App\Model\Entity\ApadrinhamentosTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApadrinhamentosTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class ApadrinhamentosTiposTable extends Table
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

        $this->setTable('apadrinhamentos_tipos');
        $this->setDisplayField('id_apadrinhamento_tipo');
        $this->setPrimaryKey('id_apadrinhamento_tipo');
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
            ->integer('id_apadrinhamento_tipo')
            ->allowEmpty('id_apadrinhamento_tipo', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('tipo_apadrinhamento')
            ->maxLength('tipo_apadrinhamento', 45)
            ->allowEmpty('tipo_apadrinhamento');

        $validator
            ->scalar('porte')
            ->maxLength('porte', 45)
            ->allowEmpty('porte');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 1)
            ->allowEmpty('sexo');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->decimal('valor')
            ->allowEmpty('valor');

        $validator
            ->scalar('periodicidade')
            ->maxLength('periodicidade', 1)
            ->allowEmpty('periodicidade');

        return $validator;
    }
}
