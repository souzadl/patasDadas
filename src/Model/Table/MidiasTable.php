<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Midias Model
 *
 * @method \App\Model\Entity\Midia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Midia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Midia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Midia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Midia|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Midia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Midia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Midia findOrCreate($search, callable $callback = null, $options = [])
 */
class MidiasTable extends Table
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

        $this->setTable('midias');
        $this->setDisplayField('id_midia');
        $this->setPrimaryKey('id_midia');
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
            ->integer('id_midia')
            ->allowEmpty('id_midia', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->date('data')
            ->allowEmpty('data');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 300)
            ->allowEmpty('titulo');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 300)
            ->allowEmpty('imagem');

        $validator
            ->scalar('tipo')
            ->allowEmpty('tipo');

        $validator
            ->scalar('link')
            ->maxLength('link', 300)
            ->allowEmpty('link');

        $validator
            ->scalar('arquivo')
            ->maxLength('arquivo', 300)
            ->allowEmpty('arquivo');

        return $validator;
    }
}
