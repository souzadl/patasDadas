<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @method \App\Model\Entity\Produto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdutosTable extends Table
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

        $this->setTable('produtos');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id_produto');
        
        $this->belongsTo('ProdutosCategorias')
            ->setForeignKey('id_produto_categoria');              
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
            ->integer('id_produto')
            ->allowEmpty('id_produto', 'create');

        $validator
            ->integer('id_produto_categoria')
            ->allowEmpty('id_produto_categoria');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 300)
            ->allowEmpty('titulo');

        $validator
            ->scalar('descricao')
            ->allowEmpty('descricao');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 300)
            ->allowEmpty('imagem');

        $validator
            ->decimal('valor')
            ->allowEmpty('valor');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmpty('ativo');

        $validator
            ->integer('peso')
            ->allowEmpty('peso');

        $validator
            ->scalar('destaque')
            ->maxLength('destaque', 1)
            ->allowEmpty('destaque');

        return $validator;
    }
}
