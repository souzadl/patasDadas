<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeficienciasFisicas Model
 *
 * @property \App\Model\Table\ProntuariosTable|\Cake\ORM\Association\BelongsTo $Prontuarios
 *
 * @method \App\Model\Entity\DeficienciasFisica get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeficienciasFisica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeficienciasFisica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeficienciasFisica|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeficienciasFisica|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeficienciasFisica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeficienciasFisica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeficienciasFisica findOrCreate($search, callable $callback = null, $options = [])
 */
class DeficienciasfisicasTable extends BaseTable
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

        $this->setTable('deficiencias_fisicas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Prontuarios', [
            'foreignKey' => 'prontuario_id',
            'joinType' => 'INNER'
        ]);
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
        $rules = parent::buildRules($rules);
        $rules->add($rules->isUnique(['descricao', 'prontuario_id']));
        $rules->add($rules->existsIn(['prontuario_id'], 'Prontuarios'));

        return $rules;
    }


}
