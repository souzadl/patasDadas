<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Medicacoes Model
 *
 * @property \App\Model\Table\ProntuariosTable|\Cake\ORM\Association\BelongsTo $Prontuarios
 *
 * @method \App\Model\Entity\Medicaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medicaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medicaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medicaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicaco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medicaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medicaco findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicacoesTable extends BaseTable
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

        $this->setTable('medicacoes');
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->scalar('uso')
            ->maxLength('uso', 45)
            ->requirePresence('uso', 'create')
            ->notEmpty('uso');

        $validator
            ->scalar('dosagem')
            ->maxLength('dosagem', 45)
            ->allowEmpty('dosagem');

        $validator
            ->scalar('frequencia')
            ->maxLength('frequencia', 45)
            ->allowEmpty('frequencia');

        $validator
            ->allowEmpty('continuo');

        $validator
            ->date('inicio')
            ->allowEmpty('inicio');

        $validator
            ->date('termino')
            ->allowEmpty('termino');

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
        $rules->add($rules->existsIn(['prontuario_id'], 'Prontuarios'));
        $rules->add(
            function($entity, $options){
                $inicio = new Time($entity->inicio);
                $termino  = new Time($entity->termino);
                return !($termino < $inicio);
            },
            'terminoMenorQueInicio',
            [
                'errorField' => 'termino',
                'message' => 'Término não pode ser menor que início.'
            ]
        );
        $rules->addDelete(
            function($entity, $options){
                $inicio = new Time($entity->inicio);
                $termino  = new Time($entity->termino);
                return !($inicio->isPast() or $termino->isPast());
            }, 
            'medicacaoEmAplicacaoOuTerminada',
            [
                'errorField' => 'medicacao',
                'message' => 'Medicação está sento aplicada ou já foi concluída, não pode ser excluída.']
            );
        return $rules;
    }

}
