<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Midias Controller
 *
 * @property \App\Model\Table\MidiasTable $Midias
 *
 * @method \App\Model\Entity\Midia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MidiasController extends AppController
{
    private function renderForm($midia, $view = 'form', $layout = null) {    
        $this->set(compact(['midia']));
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
        $midias = $this->paginate($this->Midias);

        $this->set(compact('midias'));
    }

    /**
     * View method
     *
     * @param string|null $id Midia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $midia = $this->Midias->get($id, [
            'contain' => []
        ]);

        $this->renderForm($midia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $midia = $this->Midias->newEntity();
        if ($this->request->is('post')) {
            $midia = $this->Midias->patchEntity($midia, $this->request->getData());
            if ($this->Midias->save($midia)) {
                $this->Flash->success(__('The midia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The midia could not be saved. Please, try again.'));
        }
        $this->renderForm($midia);
    }

    /**
     * Edit method
     *
     * @param string|null $id Midia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $midia = $this->Midias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $midia = $this->Midias->patchEntity($midia, $this->request->getData());
            if ($this->Midias->save($midia)) {
                $this->Flash->success(__('The midia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The midia could not be saved. Please, try again.'));
        }
        $this->renderForm($midia);
    }

    /**
     * Delete method
     *
     * @param string|null $id Midia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $midia = $this->Midias->get($id);
        if ($this->Midias->delete($midia)) {
            $this->Flash->success(__('The midia has been deleted.'));
        } else {
            $this->Flash->error(__('The midia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
