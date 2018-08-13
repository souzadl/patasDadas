<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissoesPerfis Model
 *
 * @property \App\Model\Table\PerfisTable|\Cake\ORM\Association\BelongsTo $Perfis
 * @property |\Cake\ORM\Association\BelongsTo $AcoesControles
 *
 * @method \App\Model\Entity\PermissoesPerfil get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissoesPerfil newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissoesPerfil[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesPerfil|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissoesPerfil|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissoesPerfil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesPerfil[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesPerfil findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissoesPerfisTable extends Table
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

        $this->setTable('permissoes_perfis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        /*Relação muitos para muitos entre Perfíl e Ações Controles*/
        $this->belongsTo('Perfis', [
            'foreignKey' => 'perfis_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AcoesControles', [
            'foreignKey' => 'acoes_controles_id',
            'joinType' => 'INNER'
        ]);
        /*Relação muitos para muitos entre Perfíl e Ações Controles*/
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
        $rules->add($rules->existsIn(['perfis_id'], 'Perfis'));
        $rules->add($rules->existsIn(['acoes_controles_id'], 'AcoesControles'));

        return $rules;
    }
}
