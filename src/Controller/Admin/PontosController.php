<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pontos Controller
 *
 * @property \App\Model\Table\PontosTable $Pontos
 *
 * @method \App\Model\Entity\Ponto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PontosController extends AppController
{
    private function renderForm($ponto, $view = 'form', $layout = null) {    
        $this->set(compact(['ponto']));
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
        $pontos = $this->paginate($this->Pontos);

        $this->set(compact('pontos'));
    }

    /**
     * View method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ponto = $this->Pontos->get($id, [
            'contain' => []
        ]);

        $this->renderForm($ponto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ponto = $this->Pontos->newEntity();
        if ($this->request->is('post')) {
            $ponto = $this->Pontos->patchEntity($ponto, $this->request->getData());
            if ($this->Pontos->save($ponto)) {
                $this->Flash->success(__('The ponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ponto could not be saved. Please, try again.'));
        }
        $this->renderForm($ponto);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ponto = $this->Pontos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ponto = $this->Pontos->patchEntity($ponto, $this->request->getData());
            if ($this->Pontos->save($ponto)) {
                $this->Flash->success(__('The ponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ponto could not be saved. Please, try again.'));
        }
        $this->renderForm($ponto);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ponto = $this->Pontos->get($id);
        if ($this->Pontos->delete($ponto)) {
            $this->Flash->success(__('The ponto has been deleted.'));
        } else {
            $this->Flash->error(__('The ponto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
