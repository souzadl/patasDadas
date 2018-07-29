<?php
namespace App\Controller\Admin;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController{
    use MailerAwareTrait;
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['rememberPassword', 'changePassword', 'add']);
    }

    
    private function renderForm($user, $view = 'form', $layout = null) {
        $this->set('user', $user);
        $this->set('action', $this->request->getParam('action'));
        //$this->set('roles', $this->Users->Roles->find('list')->where(['active =' => 1]));
        parent::render($view, $layout);
    }
    
    public function initialize() {
        parent::initialize();
        $this->label = 'Usuário';
        $this->loadModel('Controles');
        $this->loadModel('Acoes');    
        $this->loadModel('PermissoesUsers');   
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        $this->paginate['order'] = ['nome'];
        //$this->paginate['contain'] = ['Roles', 'Pessoas'];
        $users = $this->paginate($this->Users);              
        $this->set(compact('users'));                 
    }
    

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){        
        $user = $this->Users->get($id);

        $this->renderForm($user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $user = $this->Users->newEntity();        
        //$user->pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //$user->pessoa = $this->Pessoas->patchEntity($user->pessoa, $this->request->getData());  
            //$idsSomentePessoas = array(Configure::read('App.idRolePadrinho'), 
            //    Configure::read('App.idRoleAdotante'));
            //if(in_array($user->roles_id, $idsSomentePessoas)){                
                //Cadastro apenas de pessoa
            //    $salvo = $this->Pessoas->save($user->pessoa);
            //}else{
                //Cadastro de pessoa e usuário
                $salvo = $this->Users->save($user);
            //}
            
            if ($salvo) {
                //if(!Configure::read('debug') and !in_array($user->roles_id, $idsSomentePessoas)){
                //    $this->getMailer('User')->send('welcome', [$user]);
                //    $this->getMailer('Admin')->send('novoUsuario', [$user]);
                //}
                
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($user);
    }
    

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('{0} saved.', $this->label));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', $this->label));
        }
        $this->renderForm($user);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('{0} deleted.', $this->label));
        } else {
            $this->Flash->error(__('{0} not deleted.', $this->label));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function permissoes($id = null){
        /*$controles = $this->Controles->find('All')
            ->contain(['Permissoes' => [
                'conditions' => ['users_id' => $users_id]
            ]]);       */
        $user = $this->Users->get($id, [
            'contain' => ['PermissoesUsers'] 
        ]);
        
        $acoes = $this->Acoes->find('list'); 
        $controles = $this->Controles->find('all');         
        if ($this->request->is('post')) {                        
            try{
                $this->PermissoesUsers->getConnection()->begin();
                $this->PermissoesUsers->deleteAll(['users_id'=>$user->id]);
                $this->SalvarPermissoes($controles, $user);
                $this->PermissoesUsers->getConnection()->commit();
            } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
                $this->PermissoesUsers->getConnection()->rollback();
            }
        }
        
        $this->set(compact('controles', 'acoes', 'user'));    
    }  
    
    private function SalvarPermissoes($controles, $user){
        foreach($controles as $controle){      
            $acoes = $this->request->getData($controle->nome);
            if(is_array($acoes)){
                foreach($acoes as $acao_id){    
                    $permissao = $this->PermissoesUsers->newEntity();
                    $permissao->controles_id = $controle->id;
                    $permissao->acoes_id = $acao_id;
                    $permissao->users_id = $user->id;
                    if(!$this->PermissoesUsers->save($permissao)){
                       $this->Flash->error(__('Permissões não salvas. Por favor, teste novamente.'));
                    }                                 
                }                           
            }                    
        }        
    } 
    
    public function login(){        
        if($this->request->is('post')){            
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Inválido username ou password, tente novamente.'));
        }   
    }    
    
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    
    public function rememberPassword(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->findByEmail($this->request->data['email'])->toArray()[0];
            if($user->has('email')){
                $this->getMailer('User')->send('recovery', [$user]);
                $msg = 'Email enviado para sua caixa de email!';
                $this->Flash->success(__($msg));
                return $this->redirect(['action' => 'rememberPassword']);
            }else{
                $msg = 'Email não encontrado!';
                $this->Flash->error(__($msg));
                return $this->redirect(['action' => 'rememberPassword']);
            }
        }            
        $this->set(compact('user'));
    }
    
    public function  changePassword(){
        $user = $this->Users->newEntity();   
        if($this->request->is(['post','put'])){     
            $user = $this->Users->patchEntity($this->Users->get($this->request->getData('id_usuario')), $this->request->getData());
            if($this->Users->save($user)){
                $this->Flash->success(__('Senha alterada.'));
                return $this->redirect(['action'=>'login']);
            }else{
                $this->Flash->error(__('Senha não alterada.'));
            }
        }else{
            $q_hash = $this->request->getParam('pass')[1];
            $q_email = $this->request->getParam('pass')[0];
            $user = $this->Users->findByEmail($q_email)->toArray()[0];
            if($user and $user->hash == $q_hash){
                $this->Flash->set(__('Alterar senha do email: '.$q_email));
            }else{
                $this->Flash->set(__('Você não tem permissão para alterar esse senha!'));
                $this->redirect(array('action'=>'rememberPassword'));                    
            }
        }        
        $this->set(compact('user'));
    }
}
