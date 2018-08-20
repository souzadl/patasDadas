<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ProdutosCategorias Controller
 *
 * @property \App\Model\Table\ProdutosCategoriasTable $ProdutosCategorias
 *
 * @method \App\Model\Entity\ProdutosCategoria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosCategoriasController extends AppController
{
    private function renderForm($categoria, $view = 'form', $layout = null) {    
        $this->set(compact(['categoria']));
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    } 
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $produtosCategorias = $this->paginate($this->ProdutosCategorias);

        $this->set(compact('produtosCategorias'));
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Categoria id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosCategoria = $this->ProdutosCategorias->get($id, [
            'contain' => []
        ]);
        $this->renderForm($produtosCategoria);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosCategoria = $this->ProdutosCategorias->newEntity();
        if ($this->request->is('post')) {
            $produtosCategoria = $this->ProdutosCategorias->patchEntity($produtosCategoria, $this->request->getData());
            if ($this->ProdutosCategorias->save($produtosCategoria)) {
                $this->Flash->success(__('The produtos categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos categoria could not be saved. Please, try again.'));
        }
        $this->renderForm($produtosCategoria);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Categoria id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosCategoria = $this->ProdutosCategorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosCategoria = $this->ProdutosCategorias->patchEntity($produtosCategoria, $this->request->getData());
            if ($this->ProdutosCategorias->save($produtosCategoria)) {
                $this->Flash->success(__('The produtos categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos categoria could not be saved. Please, try again.'));
        }
        $this->renderForm($produtosCategoria);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Categoria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosCategoria = $this->ProdutosCategorias->get($id);
        if ($this->ProdutosCategorias->delete($produtosCategoria)) {
            $this->Flash->success(__('The produtos categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
