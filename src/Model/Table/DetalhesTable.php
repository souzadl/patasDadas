<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detalhes Model
 *
 * @property \App\Model\Table\MudancasTable|\Cake\ORM\Association\BelongsTo $Mudancas
 *
 * @method \App\Model\Entity\Detalhe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detalhe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Detalhe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detalhe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalhe|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalhe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detalhe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detalhe findOrCreate($search, callable $callback = null, $options = [])
 */
class DetalhesTable extends Table
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

        $this->setTable('detalhes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mudancas', [
            'foreignKey' => 'mudancas_id',
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
        $rules->add($rules->existsIn(['mudancas_id'], 'Mudancas'));

        return $rules;
    }
}
