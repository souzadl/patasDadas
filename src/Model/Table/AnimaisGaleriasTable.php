<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnimaisGaleria Model
 *
 * @method \App\Model\Entity\AnimaisGalerium get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnimaisGalerium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnimaisGalerium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnimaisGalerium|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnimaisGalerium|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnimaisGalerium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnimaisGalerium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnimaisGalerium findOrCreate($search, callable $callback = null, $options = [])
 */
class AnimaisGaleriasTable extends Table
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

        $this->setTable('animais_galeria');
        $this->setDisplayField('imagem');
        $this->setPrimaryKey('id_animal_galeria');
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
            ->integer('id_animal_galeria')
            ->allowEmpty('id_animal_galeria', 'create');

        $validator
            ->integer('id_animal')
            ->allowEmpty('id_animal');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 300)
            ->allowEmpty('imagem');

        return $validator;
    }
}
