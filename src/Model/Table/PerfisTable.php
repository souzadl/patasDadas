<?php
namespace App\Model\Table;

use Cake\Validation\Validator;

/**
 * Perfis Model
 *
 * @method \App\Model\Entity\Perfl get($primaryKey, $options = [])
 * @method \App\Model\Entity\Perfl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Perfl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Perfl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perfl|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perfl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Perfl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Perfl findOrCreate($search, callable $callback = null, $options = [])
 */
class PerfisTable extends BaseTable
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

        $this->setTable('perfis');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        /*Relação muitos para muitos entre Perfíl e Ações Controles*/
        $this->hasMany('PermissoesPerfis',[
            'dependent' => true,
            'foreignKey' => 'perfis_id'
        ]);          
        /*Relação muitos para muitos entre Perfíl e Ações Controles*/
        
        $this->belongsToMany('AcoesControles',[
            'joinTable' => 'permissoes_perfis',
            'foreignKey' => 'perfis_id'
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
            ->maxLength('nome', 50)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->boolean('ativo')
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

        return $validator;
    }
}
