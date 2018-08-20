<?php
namespace App\Model\Table;

use Cake\Validation\Validator;

/**
 * ProdutosCategorias Model
 *
 * @method \App\Model\Entity\ProdutosCategoria get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdutosCategoria newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdutosCategoria[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosCategoria|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdutosCategoria|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdutosCategoria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosCategoria[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosCategoria findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdutosCategoriasTable extends BaseTable
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

        $this->setTable('produtos_categorias');
        $this->setDisplayField('categoria');
        $this->setPrimaryKey('id_produto_categoria');
        
        $this->hasMany('Produtos');
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
            ->integer('id_produto_categoria')
            ->allowEmpty('id_produto_categoria', 'create');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('categoria')
            ->maxLength('categoria', 45)
            ->allowEmpty('categoria');

        return $validator;
    }
}
