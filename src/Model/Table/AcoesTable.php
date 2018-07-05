<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use App\Model\Table\BaseTable;
use Cake\Validation\Validator;

/**
 * Acoes Model
 *
 * @method \App\Model\Entity\Aco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aco findOrCreate($search, callable $callback = null, $options = [])
 */
class AcoesTable extends BaseTable
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

        $this->setTable('acoes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');
        
        $this->hasMany('PermissoesUsers',[
            'dependent' => true,
            'foreignKey' => 'acoes_id'
        ]);    
        
        $this->hasMany('PermissoesRoles',[
            'dependent' => true,
            'foreignKey' => 'acoes_id'
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
            ->scalar('nome')
            ->maxLength('nome', 10)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules){       
        $rules = parent::buildRules($rules);             

        return $rules;
    }    
}
