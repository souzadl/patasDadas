<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @method \App\Model\Entity\Evento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento findOrCreate($search, callable $callback = null, $options = [])
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('evento');
        $this->setPrimaryKey('id_evento');
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
            ->integer('id_evento')
            ->allowEmpty('id_evento', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->date('data')
            ->allowEmpty('data');

        $validator
            ->scalar('horario')
            ->maxLength('horario', 45)
            ->allowEmpty('horario');

        $validator
            ->scalar('local')
            ->maxLength('local', 500)
            ->allowEmpty('local');

        $validator
            ->scalar('evento')
            ->maxLength('evento', 300)
            ->allowEmpty('evento');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 300)
            ->allowEmpty('imagem');

        $validator
            ->scalar('link')
            ->maxLength('link', 300)
            ->allowEmpty('link');

        return $validator;
    }
}
