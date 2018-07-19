<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('pedido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('pedido'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
