<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlimentacoesEspeciais Model
 *
 * @property \App\Model\Table\ProntuariosTable|\Cake\ORM\Association\BelongsTo $Prontuarios
 *
 * @method \App\Model\Entity\AlimentacoesEspeciai get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlimentacoesEspeciai findOrCreate($search, callable $callback = null, $options = [])
 */
class AlimentacoesEspeciaisTable extends Table
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

        $this->setTable('alimentacoes_especiais');
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
        $rules->add($rules->existsIn(['prontuario_id'], 'Prontuarios'));

        return $rules;
    }

}
