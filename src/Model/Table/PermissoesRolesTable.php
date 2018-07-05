<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use App\Model\Table\BaseTable;
use Cake\Validation\Validator;

/**
 * PermissoesRoles Model
 *
 * @property \App\Model\Table\AcoesTable|\Cake\ORM\Association\BelongsTo $Acoes
 * @property \App\Model\Table\ControlesTable|\Cake\ORM\Association\BelongsTo $Controles
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\PermissoesRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissoesRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissoesRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissoesRole|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissoesRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesRole findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissoesRolesTable extends BaseTable
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

        $this->setTable('permissoes_roles');
        $this->setDisplayField('acoes_id');
        $this->setPrimaryKey(['acoes_id', 'controles_id', 'roles_id']);

        $this->belongsTo('Acoes', [
            'foreignKey' => 'acoes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Controles', [
            'foreignKey' => 'controles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'roles_id',
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
    public function buildRules(RulesChecker $rules){
        $rules = parent::buildRules($rules); 
        $rules->add($rules->existsIn(['acoes_id'], 'Acoes'));
        $rules->add($rules->existsIn(['controles_id'], 'Controles'));
        $rules->add($rules->existsIn(['roles_id'], 'Roles'));

        return $rules;
    }
}
