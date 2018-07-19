<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Apadrinhamentos Controller
 *
 * @property \App\Model\Table\ApadrinhamentosTable $Apadrinhamentos
 *
 * @method \App\Model\Entity\Apadrinhamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApadrinhamentosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate['contain'] = ['Animais', 'Padrinhos'];  
        $this->paginate['order'] = ['Animais.nome'];
        $apadrinhamentos = $this->paginate($this->Apadrinhamentos);

        $this->set(compact('apadrinhamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Apadrinhamento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $apadrinhamento = $this->Apadrinhamentos->get($id, [
            'contain' => []
        ]);

        $this->set('apadrinhamento', $apadrinhamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $apadrinhamento = $this->Apadrinhamentos->newEntity();
        if ($this->request->is('post')) {
            $apadrinhamento = $this->Apadrinhamentos->patchEntity($apadrinhamento, $this->request->getData());
            if ($this->Apadrinhamentos->save($apadrinhamento)) {
                $this->Flash->success(__('The apadrinhamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apadrinhamento could not be saved. Please, try again.'));
        }
        $this->set(compact('apadrinhamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apadrinhamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $apadrinhamento = $this->Apadrinhamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apadrinhamento = $this->Apadrinhamentos->patchEntity($apadrinhamento, $this->request->getData());
            if ($this->Apadrinhamentos->save($apadrinhamento)) {
                $this->Flash->success(__('The apadrinhamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apadrinhamento could not be saved. Please, try again.'));
        }
        $this->set(compact('apadrinhamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apadrinhamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $apadrinhamento = $this->Apadrinhamentos->get($id);
        if ($this->Apadrinhamentos->delete($apadrinhamento)) {
            $this->Flash->success(__('The apadrinhamento has been deleted.'));
        } else {
            $this->Flash->error(__('The apadrinhamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
