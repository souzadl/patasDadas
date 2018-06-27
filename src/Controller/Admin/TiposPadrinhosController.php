<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TiposPadrinhos Controller
 *
 * @property \App\Model\Table\TiposPadrinhosTable $TiposPadrinhos
 *
 * @method \App\Model\Entity\TiposPadrinho[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiposPadrinhosController extends AppController
{
    private function renderForm($tipoPadrinho, $view = 'form', $layout = null) {
        $this->set('tipoPadrinho', $tipoPadrinho);
        $this->set('action', $this->request->getParam('action'));
        $this->set('users',  $this->TiposPadrinhos->Users->find('list'));
        parent::render($view, $layout);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $tiposPadrinhos = $this->paginate($this->TiposPadrinhos);

        $this->set(compact('tiposPadrinhos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipos Padrinho id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $tipoPadrinho = $this->TiposPadrinhos->get($id, [
            'contain' => ['Users']
        ]);

        $this->renderForm($tipoPadrinho);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoPadrinho = $this->TiposPadrinhos->newEntity();
        if ($this->request->is('post')) {
            $tipoPadrinho = $this->TiposPadrinhos->patchEntity($tipoPadrinho, $this->request->getData());
            $tipoPadrinho->users_id = $this->Auth->user()['id'];
            if ($this->TiposPadrinhos->save($tipoPadrinho)) {
                $this->Flash->success(__('The tipos padrinho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos padrinho could not be saved. Please, try again.'));
        }
        
        $this->renderForm($tipoPadrinho);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Padrinho id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $tipoPadrinho = $this->TiposPadrinhos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoPadrinho = $this->TiposPadrinhos->patchEntity($tipoPadrinho, $this->request->getData());
            if ($this->TiposPadrinhos->save($tipoPadrinho)) {
                $this->Flash->success(__('The tipos padrinho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos padrinho could not be saved. Please, try again.'));
        }
        $this->renderForm($tipoPadrinho);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Padrinho id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposPadrinho = $this->TiposPadrinhos->get($id);
        if ($this->TiposPadrinhos->delete($tiposPadrinho)) {
            $this->Flash->success(__('The tipos padrinho has been deleted.'));
        } else {
            $this->Flash->error(__('The tipos padrinho could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
