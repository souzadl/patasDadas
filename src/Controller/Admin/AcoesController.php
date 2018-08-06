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
class AcoesController extends AppController{
    public function initialize() {
        parent::initialize();
        $this->label = 'Ação';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        $this->paginate['order'] = ['nome'];   
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
    public function view($id = null){
        $acao = $this->Acoes->get($id, [
            'contain' => []
        ]);

        $this->renderForm($acao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $acao = $this->Acoes->newEntity();
        if ($this->request->is('post')) {
            $acao = $this->Acoes->patchEntity($acao, $this->request->getData());
            $acao->ativo = true;
            if ($this->Acoes->save($acao)) {
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($acao);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $acao = $this->Acoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acao = $this->Acoes->patchEntity($acao, $this->request->getData());
            if ($this->Acoes->save($acao)) {
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($acao);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $aco = $this->Acoes->get($id);
        if ($this->Acoes->delete($aco)) {
            $this->Flash->success(__('{0} deleted.', $this->label));
        } else {
            $this->Flash->error(__('{0} not deleted.', $this->label));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    private function renderForm($acao, $view = 'form', $layout = null) {
        $this->set('acao', $acao);
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    }    
}
