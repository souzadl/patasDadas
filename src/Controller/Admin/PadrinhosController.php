<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Padrinhos Controller
 *
 * @property \App\Model\Table\PadrinhosTable $Padrinhos
 *
 * @method \App\Model\Entity\Padrinho[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadrinhosController extends AppController
{
    private function renderForm($padrinho, $view = 'form', $layout = null) {    
        $this->set(compact(['padrinho']));
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
        $padrinhos = $this->paginate($this->Padrinhos);

        $this->set(compact('padrinhos'));
    }

    /**
     * View method
     *
     * @param string|null $id Padrinho id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padrinho = $this->Padrinhos->get($id, [
            'contain' => [/*'Pessoas', 'Adotaveis', 'TiposPadrinhos', 'Users'*/]
        ]);

        $this->renderForm($padrinho);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padrinho = $this->Padrinhos->newEntity();
        if ($this->request->is('post')) {
            $padrinho = $this->Padrinhos->patchEntity($padrinho, $this->request->getData());
            if ($this->Padrinhos->save($padrinho)) {
                $this->Flash->success(__('The padrinho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The padrinho could not be saved. Please, try again.'));
        }
        $this->renderForm($padrinho);
    }

    /**
     * Edit method
     *
     * @param string|null $id Padrinho id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padrinho = $this->Padrinhos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padrinho = $this->Padrinhos->patchEntity($padrinho, $this->request->getData());
            if ($this->Padrinhos->save($padrinho)) {
                $this->Flash->success(__('The padrinho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The padrinho could not be saved. Please, try again.'));
        }
        $this->renderForm($padrinho);
    }

    /**
     * Delete method
     *
     * @param string|null $id Padrinho id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padrinho = $this->Padrinhos->get($id);
        if ($this->Padrinhos->delete($padrinho)) {
            $this->Flash->success(__('The padrinho has been deleted.'));
        } else {
            $this->Flash->error(__('The padrinho could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
