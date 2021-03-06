<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use App\Model\Table\BaseTable;
use Cake\Validation\Validator;

/**
 * Controles Model
 *
 * @method \App\Model\Entity\Controle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Controle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Controle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Controle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controle|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Controle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Controle findOrCreate($search, callable $callback = null, $options = [])
 */
class ControlesTable extends BaseTable
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

        $this->setTable('controles');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');
        
        $this->hasMany('PermissoesUsers',[
            'dependent' => true,
            'foreignKey' => 'controles_id'
        ]); 
        
        $this->hasMany('PermissoesRoles',[
            'dependent' => true,
            'foreignKey' => 'controles_id'
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
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
    
    /*public function findComPermissoes(Query $query, array $options) {
        if(is_array($options) and isset($options['conditions'])){
            $conditions = $options['conditions'];
            unset($options['conditions']);
        }else{
            $conditions = '';
        }
        return $query->contain(['Permissoes' => [
            'conditions' => $conditions
        ]]);
    }*/
    
    public function buildRules(RulesChecker $rules){       
        $rules = parent::buildRules($rules);        

        return $rules;
    }      
}
