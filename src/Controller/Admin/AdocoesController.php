<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Adocoes Controller
 *
 * @property \App\Model\Table\AdocoesTable $Adocoes
 *
 * @method \App\Model\Entity\Adoco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdocoesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $adocoes = $this->paginate($this->Adocoes);

        $this->set(compact('adocoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Adoco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $adoco = $this->Adocoes->get($id, [
            'contain' => []
        ]);

        $this->set('adoco', $adoco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $adoco = $this->Adocoes->newEntity();
        if ($this->request->is('post')) {
            $adoco = $this->Adocoes->patchEntity($adoco, $this->request->getData());
            if ($this->Adocoes->save($adoco)) {
                $this->Flash->success(__('The adoco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoco could not be saved. Please, try again.'));
        }
        $this->set(compact('adoco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adoco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $adoco = $this->Adocoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adoco = $this->Adocoes->patchEntity($adoco, $this->request->getData());
            if ($this->Adocoes->save($adoco)) {
                $this->Flash->success(__('The adoco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoco could not be saved. Please, try again.'));
        }
        $this->set(compact('adoco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adoco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $adoco = $this->Adocoes->get($id);
        if ($this->Adocoes->delete($adoco)) {
            $this->Flash->success(__('The adoco has been deleted.'));
        } else {
            $this->Flash->error(__('The adoco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
