<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Parceiros Controller
 *
 * @property \App\Model\Table\ParceirosTable $Parceiros
 *
 * @method \App\Model\Entity\Parceiro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParceirosController extends AppController
{
    private function renderForm($parceiro, $view = 'form', $layout = null) {    
        $this->set(compact(['parceiro']));
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
        $parceiros = $this->paginate($this->Parceiros);

        $this->set(compact('parceiros'));
    }

    /**
     * View method
     *
     * @param string|null $id Parceiro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parceiro = $this->Parceiros->get($id, [
            'contain' => []
        ]);

        $this->renderForm($parceiro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parceiro = $this->Parceiros->newEntity();
        if ($this->request->is('post')) {
            $parceiro = $this->Parceiros->patchEntity($parceiro, $this->request->getData());
            if ($this->Parceiros->save($parceiro)) {
                $this->Flash->success(__('The parceiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parceiro could not be saved. Please, try again.'));
        }
        $this->renderForm($parceiro);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parceiro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parceiro = $this->Parceiros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parceiro = $this->Parceiros->patchEntity($parceiro, $this->request->getData());
            if ($this->Parceiros->save($parceiro)) {
                $this->Flash->success(__('The parceiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parceiro could not be saved. Please, try again.'));
        }
        $this->renderForm($parceiro);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parceiro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parceiro = $this->Parceiros->get($id);
        if ($this->Parceiros->delete($parceiro)) {
            $this->Flash->success(__('The parceiro has been deleted.'));
        } else {
            $this->Flash->error(__('The parceiro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
