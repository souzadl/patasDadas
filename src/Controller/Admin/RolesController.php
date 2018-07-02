<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController{
    public function initialize() {
        parent::initialize();
        $this->loadModel('Acoes');     
        $this->loadModel('Controles');
        $this->loadModel('PermissoesRoles');
    }    
    
    public function renderForm($role, $view = 'form', $layout = null) {
        $this->set('role', $role);
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);

        $this->renderForm($role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        
        $this->renderForm($role);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }

        $this->renderForm($role);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function permissoes($id = null){
        $role = $this->Roles->get($id, [
            'contain' => ['PermissoesRoles'] 
        ]);
        $acoes = $this->Acoes->find('list'); 
        $controles = $this->Controles->find('all');                                 
        if ($this->request->is('post')) { 
            try{
                $this->PermissoesRoles->getConnection()->begin();
                $this->PermissoesRoles->deleteAll(['roles_id'=>$role->id]);
                $this->SalvarPermissoes($controles, $role);
                $this->PermissoesRoles->getConnection()->commit();
            } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
                $this->PermissoesRoles->getConnection()->rollback();
            }            
        }
        $this->set(compact('controles', 'acoes', 'role'));
    }
    
    private function salvarPermissoes($controles, $role){
        foreach($controles as $controle){
            $acoes = $this->request->getData($controle->nome);
            if(is_array($acoes)){              
                foreach($acoes as $acao_id){    
                    $permissao = $this->PermissoesRoles->newEntity();
                    $permissao->controles_id = $controle->id;
                    $permissao->acoes_id = $acao_id;
                    $permissao->roles_id = $role->id;
                    if(!$this->PermissoesRoles->save($permissao)){
                       $this->Flash->error(__('Permissões não salvas. Por favor, teste novamente.'));
                    }                                 
                }                           
            }         
        }
    }
}
