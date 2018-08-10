<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AcoesControles Model
 *
 * @property \App\Model\Table\ControlesTable|\Cake\ORM\Association\BelongsTo $Controles
 * @property \App\Model\Table\AcoesTable|\Cake\ORM\Association\BelongsTo $Acoes
 *
 * @method \App\Model\Entity\AcoesControle get($primaryKey, $options = [])
 * @method \App\Model\Entity\AcoesControle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AcoesControle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AcoesControle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AcoesControle|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AcoesControle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AcoesControle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AcoesControle findOrCreate($search, callable $callback = null, $options = [])
 */
class AcoesControlesTable extends Table
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

        $this->setTable('acoes_controles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Controles', [
            'foreignKey' => 'controles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Acoes', [
            'foreignKey' => 'acoes_id',
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
        $rules->add($rules->existsIn(['controles_id'], 'Controles'));
        $rules->add($rules->existsIn(['acoes_id'], 'Acoes'));

        return $rules;
    }
}
