<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlteracoesDetalhes Model
 *
 * @property \App\Model\Table\AlteracoesTable|\Cake\ORM\Association\BelongsTo $Alteracoes
 *
 * @method \App\Model\Entity\AlteracoesDetalhe get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlteracoesDetalhe findOrCreate($search, callable $callback = null, $options = [])
 */
class AlteracoesdetalhesTable extends Table
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

        $this->setTable('alteracoes_detalhes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alteracoes', [
            'foreignKey' => 'alteracoes_id',
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
        $rules->add($rules->existsIn(['alteracoes_id'], 'Alteracoes'));

        return $rules;
    }
}
