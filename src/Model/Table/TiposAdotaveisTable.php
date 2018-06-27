<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Rule\NoAssociatedData;

/**
 * TiposAdotaveis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TiposAdotavei get($primaryKey, $options = [])
 * @method \App\Model\Entity\TiposAdotavei newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TiposAdotavei[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TiposAdotavei|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TiposAdotavei|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TiposAdotavei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TiposAdotavei[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TiposAdotavei findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TiposAdotaveisTable extends Table
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

        $this->setTable('tipos_adotaveis');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Adotaveis',[
            'dependent' => true,
            'foreignKey' => 'tipos_adotaveis_id'
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
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome','Nome obrigatório.');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        
        foreach ($this->associations()->type('HasOne') + $this->associations()->type('HasMany') as $association) {
            if ($association->dependent()) {
                $rules->addDelete(new NoAssociatedData($association), 'NoAssociatedData', ['errorField' => 'error' ,'message'=>'Registro ainda possui associação.']);
            }
        }        

        return $rules;
    }
    
    
}
