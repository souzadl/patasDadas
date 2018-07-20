<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conteudos Model
 *
 * @method \App\Model\Entity\Conteudo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conteudo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conteudo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conteudo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conteudo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conteudo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conteudo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conteudo findOrCreate($search, callable $callback = null, $options = [])
 */
class ConteudosTable extends Table
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

        $this->setTable('conteudos');
        $this->setDisplayField('id_conteudo');
        $this->setPrimaryKey('id_conteudo');
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
            ->integer('id_conteudo')
            ->allowEmpty('id_conteudo', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('missao')
            ->allowEmpty('missao');

        $validator
            ->scalar('historia')
            ->allowEmpty('historia');

        $validator
            ->scalar('arquivo')
            ->maxLength('arquivo', 300)
            ->allowEmpty('arquivo');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 300)
            ->allowEmpty('imagem');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 300)
            ->allowEmpty('facebook');

        $validator
            ->scalar('twitter')
            ->maxLength('twitter', 300)
            ->allowEmpty('twitter');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 300)
            ->allowEmpty('instagram');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
