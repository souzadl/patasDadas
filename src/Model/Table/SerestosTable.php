<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Serestos Model
 *
 * @property \App\Model\Table\ProntuariosTable|\Cake\ORM\Association\BelongsTo $Prontuarios
 *
 * @method \App\Model\Entity\Seresto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Seresto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Seresto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Seresto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Seresto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Seresto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Seresto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Seresto findOrCreate($search, callable $callback = null, $options = [])
 */
class SerestosTable extends BaseTable
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

        $this->setTable('serestos');
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
            ->date('data_aplicacao')
            ->requirePresence('data_aplicacao', 'create')
            ->notEmpty('data_aplicacao');

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
        $rules->add($rules->isUnique(['data_aplicacao', 'prontuario_id']));
        $rules->add($rules->existsIn(['prontuario_id'], 'Prontuarios'));

        return $rules;
    }
}
