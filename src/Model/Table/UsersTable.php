<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use App\Model\Table\BaseTable;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends BaseTable
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

        $this->setTable('usuarios');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id_usuario');

        //$this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoas_id',
            'joinType' => 'left'
        ]);   
        
        $this->belongsTo('Perfis', [
            'foreignKey' => 'perfis_id',
            'joinType' => 'left'
        ]);  
        
        
        
        /*$this->belongsTo('Roles', [
            'foreignKey' => 'roles_id',
            'joinType' => 'INNER'
        ]);        
        
        $this->hasMany('PermissoesUsers',[
            'dependent' => true,
            'foreignKey' => 'users_id'
        ]);*/
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
            ->integer('id_usuario')
            ->allowEmpty('id_usuario', 'create');

        /*$validator
            ->scalar('nome')
            ->maxLength('nome', 200)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');*/

        $validator
            ->scalar('login')
            ->maxLength('login', 100)
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->scalar('senha')
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');
        
        $validator
            ->add(
                'confirm_senha', 
                'compareWith',[
                    'rule' => ['compareWith', 'senha'],
                    'message' => 'Confirmação de senha não é igual.'
                ]
            );

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules){
        $rules = parent::buildRules($rules);        
        $rules->add($rules->isUnique(['login']));
        //$rules->add($rules->existsIn(['roles_id'], 'Roles'));
        return $rules;
    }
    
    public function findAuth(Query $query, array $options){
        $query
            ->select(['id_usuario', 'login', 'senha', 'pessoas.email', 'pessoas.nome'])
            ->where(['Users.ativo' => 'S'])
            ->contain('Pessoas');

        return $query;    
    }
}
