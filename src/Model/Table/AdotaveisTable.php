<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adotaveis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TiposAdotaveisTable|\Cake\ORM\Association\BelongsTo $TiposAdotaveis
 *
 * @method \App\Model\Entity\Adotavei get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adotavei newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adotavei[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adotavei|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adotavei|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adotavei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adotavei[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adotavei findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdotaveisTable extends Table
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

        $this->setTable('adotaveis');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TiposAdotaveis', [
            'foreignKey' => 'tipos_adotaveis_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Padrinhos')
            ->setForeignKey('adotaveis_id')
            ->setDependent(true);
        $this->hasMany('Fotos')
            ->setForeignKey('adotaveis_id')
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
            ->integer('tipos_adotaveis_id')
            ->requirePresence('tipos_adotaveis_id', 'create')
            ->notEmpty('tipos_adotaveis_id');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome')
            ->add('nome', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message'=>'Nome já cadastrado para outro adotável.']);

        $validator
            ->scalar('porte')
            ->maxLength('porte', 1)
            ->requirePresence('porte', 'create')
            ->notEmpty('porte');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 1)
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->integer('idade')
            ->requirePresence('idade', 'create')
            ->notEmpty('idade');

        $validator
            ->boolean('vacinado')
            ->requirePresence('vacinado', 'create')
            ->notEmpty('vacinado');

        $validator
            ->boolean('vermifugado')
            ->requirePresence('vermifugado', 'create')
            ->notEmpty('vermifugado');

        $validator
            ->boolean('castrado')
            ->requirePresence('castrado', 'create')
            ->notEmpty('castrado');

        $validator
            ->scalar('temperamento')
            ->maxLength('temperamento', 255)
            ->allowEmpty('temperamento');

        $validator
            ->scalar('descricao_site')
            ->allowEmpty('descricao_site');

        $validator
            ->scalar('historico_medico')
            ->allowEmpty('historico_medico');

        $validator
            ->scalar('url_facebook')
            ->maxLength('url_facebook', 255)
            ->allowEmpty('url_facebook')
            ->add('url_facebook', 'valid-url', ['rule' => 'url']);

        $validator
            ->scalar('url_intagram')
            ->maxLength('url_intagram', 255)
            ->allowEmpty('url_intagram')
            ->add('url_facebook', 'valid-url', ['rule' => 'url']);

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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome'], 'Este nome já está sendo usado.'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['tipos_adotaveis_id'], 'TiposAdotaveis'));

        return $rules;
    }
}
