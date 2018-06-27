<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TiposAdotaveis Controller
 *
 * @property \App\Model\Table\TiposAdotaveisTable $TiposAdotaveis
 *
 * @method \App\Model\Entity\TiposAdotavei[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiposAdotaveisController extends AppController
{
    private function renderForm($tipoAdotavel, $view = 'form', $layout = null) {
        $this->set('tipoAdotavel', $tipoAdotavel);
        $this->set('action', $this->request->getParam('action'));
        $this->set('users',  $this->TiposAdotaveis->Users->find('list'));
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
        $tiposAdotaveis = $this->paginate($this->TiposAdotaveis);

        $this->set(compact('tiposAdotaveis'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipos Adotavei id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $tipoAdotavel = $this->TiposAdotaveis->get($id, [
            'contain' => ['Users']
        ]);

        $this->renderForm($tipoAdotavel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $tipoAdotavel = $this->TiposAdotaveis->newEntity();
        if ($this->request->is('post')) {
            $tipoAdotavel = $this->TiposAdotaveis->patchEntity($tipoAdotavel, $this->request->getData());
            $tipoAdotavel->users_id = $this->Auth->user()['id'];
            if ($this->TiposAdotaveis->save($tipoAdotavel)) {
                $this->Flash->success(__('Tipo Adotável salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tipo Adotável não pode ser salvo. Por favor, tente novamente.'));
        }
        $this->renderForm($tipoAdotavel);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Adotavei id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $tipoAdotavel = $this->TiposAdotaveis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoAdotavel = $this->TiposAdotaveis->patchEntity($tipoAdotavel, $this->request->getData());
            $tipoAdotavel->users_id = $this->Auth->user()['id'];
            if ($this->TiposAdotaveis->save($tipoAdotavel)) {
                $this->Flash->success(__('Tipo Adotável salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tipo Adotável não pode ser salvo. Por favor, tente novamente.'));
        }
        $this->renderForm($tipoAdotavel);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Adotavei id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoAdotavel = $this->TiposAdotaveis->get($id);
        if ($this->TiposAdotaveis->delete($tipoAdotavel)) {
            $this->Flash->success(__('Tipo Adotável excluído.'));
        } else {
            foreach ($tipoAdotavel->errors() as $erro){
                foreach ($erro as $index=>$mensagem){
                    $this->Flash->error(__($mensagem));
                }  
            }
            $this->Flash->error(__('Tipo Adotável não pode ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
