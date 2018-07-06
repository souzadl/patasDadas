<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 *
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasController extends AppController{
    var $idsRolesUsuarios;
    var $showActive;
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['addPublic']);
    }    
    
    public function initialize() {
        parent::initialize();
        $this->label = 'Pessoa';
        $this->loadModel('Users');
        $this->idsRolesUsuarios = array(Configure::read('App.idRoleAdmin'), 
            Configure::read('App.idRoleVoluntario'),
            Configure::read('App.idRoleSistema'));
        $this->showActive = ($this->Auth->user() 
            && in_array($this->Auth->user(['roles_id']),[Configure::read('App.idRoleSistema'), Configure::read('App.idRoleAdmin')]));
    }
    
    private function renderForm($pessoa, $view = 'form', $layout = null) {
        $filtroRoles['active ='] = 1;
        if($this->request->getParam('action') === 'addPublic'){
            $filtroRoles['id NOT IN'] = array(Configure::read('App.idRoleSistema'), Configure::read('App.idRoleAdmin'));
        }
        
        $this->set('pessoa', $pessoa);
        $this->set('action', $this->request->getParam('action'));
        $this->set('roles', $this->Pessoas->Roles->find('list')->where($filtroRoles));
        $this->set('idsRolesUsuarios', $this->idsRolesUsuarios);     
        //$this->set('idRoleSistema', Configure::read('App.idRoleSistema'));
        //$this->set('idRoleAdmin', Configure::read('App.idRoleAdmin'));
        $this->set('showActive', $this->showActive);
        parent::render($view, $layout);
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        $this->paginate['contain'] = ['Roles', 'Users'];  
        $this->paginate['order'] = ['Pessoas.nome'];  
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Roles', 'Users']
        ]);

        $this->renderForm($pessoa);
    }
    
    public function addPublic(){
        $this->add();
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $pessoa = $this->Pessoas->newEntity();
        $pessoa->user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            $pessoa->user = (in_array($pessoa->roles_id, $this->idsRolesUsuarios)) ?
                $this->Users->patchEntity($pessoa->user, $this->request->getData()) : NULL;
            if($this->showActive){
                $pessoa->active = $this->request->getData('active');
                $this->setActionUser($pessoa);
            }else{
                $pessoa->active = FALSE;
                $this->setActionUser($pessoa);
            }
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($pessoa);
    }
    
    private function setActionUser($pessoa){
        if(isset($pessoa->user)){
            $pessoa->user->active = $pessoa->active;
        }        
    }    

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            $pessoa->user = (in_array($pessoa->roles_id, $this->idsRolesUsuarios)) ?
                $this->Users->patchEntity($pessoa->user, $this->request->getData()) : NULL;
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($pessoa);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('{0} deleted.', $this->label));
        } else {
            $this->Flash->error(__('{0} not deleted.', $this->label));
        }

        return $this->redirect(['action' => 'index']);
    }
}
