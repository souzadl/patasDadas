<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Padrinhos Model
 *
 * @property \App\Model\Table\PadrinhosTable|\Cake\ORM\Association\BelongsTo $Padrinhos
 * @property \App\Model\Table\AdotaveisTable|\Cake\ORM\Association\BelongsTo $Adotaveis
 * @property \App\Model\Table\TiposPadrinhosTable|\Cake\ORM\Association\BelongsTo $TiposPadrinhos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PadrinhosTable|\Cake\ORM\Association\HasMany $Padrinhos
 *
 * @method \App\Model\Entity\Padrinho get($primaryKey, $options = [])
 * @method \App\Model\Entity\Padrinho newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Padrinho[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padrinho|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padrinho patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Padrinho findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PadrinhosTable extends Table
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

        $this->setTable('padrinhos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'padrinho_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Adotaveis', [
            'foreignKey' => 'adotaveis_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TiposPadrinhos', [
            'foreignKey' => 'tipos_padrinhos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Padrinhos', [
            'foreignKey' => 'padrinho_id'
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
        $rules->add($rules->existsIn(['padrinho_id'], 'Users'));
        $rules->add($rules->existsIn(['adotaveis_id'], 'Adotaveis'));
        $rules->add($rules->existsIn(['tipos_padrinhos_id'], 'TiposPadrinhos'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
