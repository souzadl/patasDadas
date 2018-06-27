<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Controles Controller
 *
 * @property \App\Model\Table\ControlesTable $Controles
 *
 * @method \App\Model\Entity\Controle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $controles = $this->paginate($this->Controles);

        $this->set(compact('controles'));
    }

    /**
     * View method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $controle = $this->Controles->get($id, [
            'contain' => []
        ]);

        $this->set('controle', $controle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controle = $this->Controles->newEntity();
        if ($this->request->is('post')) {
            $controle = $this->Controles->patchEntity($controle, $this->request->getData());
            if ($this->Controles->save($controle)) {
                $this->Flash->success(__('The controle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controle could not be saved. Please, try again.'));
        }
        $this->set(compact('controle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controle = $this->Controles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controle = $this->Controles->patchEntity($controle, $this->request->getData());
            if ($this->Controles->save($controle)) {
                $this->Flash->success(__('The controle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controle could not be saved. Please, try again.'));
        }
        $this->set(compact('controle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controle = $this->Controles->get($id);
        if ($this->Controles->delete($controle)) {
            $this->Flash->success(__('The controle has been deleted.'));
        } else {
            $this->Flash->error(__('The controle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
