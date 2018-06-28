<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissoes Model
 *
 * @property \App\Model\Table\AcoesTable|\Cake\ORM\Association\BelongsTo $Acoes
 * @property \App\Model\Table\ControlesTable|\Cake\ORM\Association\BelongsTo $Controles
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Permisso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permisso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permisso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permisso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permisso|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permisso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissoesTable extends Table
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

        $this->setTable('permissoes');
        $this->setPrimaryKey(['acoes_id', 'users_id', 'controles_id']);

        $this->belongsTo('Acoes', [
            'foreignKey' => 'acoes_id',
            'joinType' => 'INNER'
        ]);        
        $this->belongsTo('Controles', [
            'foreignKey' => 'controles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);    
        
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
        $rules->add($rules->existsIn(['acoes_id'], 'Acoes'));
        $rules->add($rules->existsIn(['controles_id'], 'Controles'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
