<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Conteudos Controller
 *
 * @property \App\Model\Table\ConteudosTable $Conteudos
 *
 * @method \App\Model\Entity\Conteudo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConteudosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conteudos = $this->paginate($this->Conteudos);

        $this->set(compact('conteudos'));
    }

    /**
     * View method
     *
     * @param string|null $id Conteudo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conteudo = $this->Conteudos->get($id, [
            'contain' => []
        ]);

        $this->set('conteudo', $conteudo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conteudo = $this->Conteudos->newEntity();
        if ($this->request->is('post')) {
            $conteudo = $this->Conteudos->patchEntity($conteudo, $this->request->getData());
            if ($this->Conteudos->save($conteudo)) {
                $this->Flash->success(__('The conteudo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conteudo could not be saved. Please, try again.'));
        }
        $this->set(compact('conteudo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conteudo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conteudo = $this->Conteudos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conteudo = $this->Conteudos->patchEntity($conteudo, $this->request->getData());
            if ($this->Conteudos->save($conteudo)) {
                $this->Flash->success(__('The conteudo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conteudo could not be saved. Please, try again.'));
        }
        $this->set(compact('conteudo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conteudo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conteudo = $this->Conteudos->get($id);
        if ($this->Conteudos->delete($conteudo)) {
            $this->Flash->success(__('The conteudo has been deleted.'));
        } else {
            $this->Flash->error(__('The conteudo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
