<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlteracoesSaudesObservacoes Model
 *
 * @property \App\Model\Table\AlteracoesSaudesTable|\Cake\ORM\Association\BelongsTo $AlteracoesSaudes
 *
 * @method \App\Model\Entity\AlteracoesSaudesObservaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesSaudesObservaco findOrCreate($search, callable $callback = null, $options = [])
 */
class AlteracoesSaudesObservacoesTable extends BaseTable
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

        $this->setTable('alteracoes_saudes_observacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AlteracoesSaudes', [
            'foreignKey' => 'alteracoes_saude_id',
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
            ->date('data')
            ->allowEmpty('data');

        $validator
            ->scalar('obs')
            ->maxLength('obs', 200)
            ->allowEmpty('obs');

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
        $rules->add($rules->existsIn(['alteracoes_saude_id'], 'AlteracoesSaudes'));

        return $rules;
    }
}
