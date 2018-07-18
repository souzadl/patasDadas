<?php
namespace App\Controller;

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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'Adotaveis', 'TiposPadrinhos', 'Users']
        ];
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
            'contain' => ['Pessoas', 'Adotaveis', 'TiposPadrinhos', 'Users']
        ]);

        $this->set('padrinho', $padrinho);
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
        $pessoas = $this->Padrinhos->Pessoas->find('list', ['limit' => 200]);
        $adotaveis = $this->Padrinhos->Adotaveis->find('list', ['limit' => 200]);
        $tiposPadrinhos = $this->Padrinhos->TiposPadrinhos->find('list', ['limit' => 200]);
        $users = $this->Padrinhos->Users->find('list', ['limit' => 200]);
        $this->set(compact('padrinho', 'pessoas', 'adotaveis', 'tiposPadrinhos', 'users'));
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
        $pessoas = $this->Padrinhos->Pessoas->find('list', ['limit' => 200]);
        $adotaveis = $this->Padrinhos->Adotaveis->find('list', ['limit' => 200]);
        $tiposPadrinhos = $this->Padrinhos->TiposPadrinhos->find('list', ['limit' => 200]);
        $users = $this->Padrinhos->Users->find('list', ['limit' => 200]);
        $this->set(compact('padrinho', 'pessoas', 'adotaveis', 'tiposPadrinhos', 'users'));
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
