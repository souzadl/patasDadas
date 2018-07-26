<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mudancas Model
 *
 * @property \App\Model\Table\ProntuariosTable|\Cake\ORM\Association\BelongsTo $Prontuarios
 *
 * @method \App\Model\Entity\Mudanca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mudanca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mudanca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mudanca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mudanca|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mudanca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mudanca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mudanca findOrCreate($search, callable $callback = null, $options = [])
 */
class MudancasTable extends Table
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

        $this->setTable('mudancas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Prontuarios', [
            'foreignKey' => 'prontuario_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Detalhes')
            ->setForeignKey('mudancas_id')
            ->setDependent(true);
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
            ->scalar('status')
            ->maxLength('status', 1)
            ->allowEmpty('status');

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
