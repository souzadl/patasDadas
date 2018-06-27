<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Acoes Controller
 *
 * @property \App\Model\Table\AcoesTable $Acoes
 *
 * @method \App\Model\Entity\Aco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AcoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $acoes = $this->paginate($this->Acoes);

        $this->set(compact('acoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Aco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aco = $this->Acoes->get($id, [
            'contain' => []
        ]);

        $this->set('aco', $aco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aco = $this->Acoes->newEntity();
        if ($this->request->is('post')) {
            $aco = $this->Acoes->patchEntity($aco, $this->request->getData());
            if ($this->Acoes->save($aco)) {
                $this->Flash->success(__('The aco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aco could not be saved. Please, try again.'));
        }
        $this->set(compact('aco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aco = $this->Acoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aco = $this->Acoes->patchEntity($aco, $this->request->getData());
            if ($this->Acoes->save($aco)) {
                $this->Flash->success(__('The aco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aco could not be saved. Please, try again.'));
        }
        $this->set(compact('aco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aco = $this->Acoes->get($id);
        if ($this->Acoes->delete($aco)) {
            $this->Flash->success(__('The aco has been deleted.'));
        } else {
            $this->Flash->error(__('The aco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
