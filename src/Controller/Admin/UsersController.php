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
class UsersController extends AppController
{
    use MailerAwareTrait;
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['rememberPassword', 'changePassword']);
    }

    public function isAuthorized($user) {
        $result = parent::isAuthorized($user);
        //die(Configure::read('App.idRoleAdmin'));
        //echo "<pre>";      
        if ($result){
            switch ($this->request->getParam('action')){
                case "add":
                case "edit":
                case "delete":
                case "view":
                    //Usuário do tipo admin
                    //var_dump($user);
                    $result = isset($user['roles_id']) 
                        && $user['roles_id'] === Configure::read('App.idRoleAdmin');
                    break;
            }
            
        }

        //var_dump($result);
        //die;
        //var_dump($user['roles_id']);
        return $result;
    }
    
    private function renderForm($user, $view = 'form', $layout = null) {
        $this->set('user', $user);
        $this->set('action', $this->request->getParam('action'));
        $this->set('roles', $this->Users->Roles->find('list')->where(['active =' => 1]));
        parent::render($view, $layout);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate['contain'] = ['Roles'];

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
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->renderForm($user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->getMailer('User')->send('welcome', [$user]);
                $this->getMailer('Admin')->send('novoUsuario', [$user]);
                
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
        if(!empty($this->request->data)){
            if($this->request->is('post')){
                $user = $this->Users->patchEntities($user, $this->request->getData());
                if($user = $this->Users->findByEmail($this->request->data['email'])->toArray()){
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
        }
        $this->set(compact('user'));
    }
    
    public function  changePassword(){
        $q_hash = $this->request->query('h');
        $q_email = $this->request->query('email');
        $user = $this->Users->newEntity();
        if($this->request->is(['post','put'])){ 
            //$this->Users->pa
            $user = $this->Users->get($this->request->data['id']);
            //echo "<pre>";
            //var_dump($this->request->data);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //var_dump($user);
            //$user = $this->Users->patchEntities($user, $this->request->data);
            //var_dump($user);
            if($this->Users->save($user)){
                $this->Flash->success(__('The password has been saved.'));
                return $this->redirect(['action'=>'login']);
            }else{
                $this->Flash->error(__('The password could not be saved. Please, try again.'));
            }
        }else{
            if($user = $this->Users->findByEmail($q_email)->toArray()){
                $hash = substr($user[0]['password'], 0, 25);
                if($hash == $q_hash){
                    $this->Flash->set(__('Alterar senha do email: '.$q_email));
                }else{
                    $this->Flash->set(__('Você não tem permissão para alterar esse senha!'));
                    $this->redirect(array('action'=>'rememberPassword'));                    
                }
            }
        }
        $this->set('id', $user[0]['id']);
        $this->set(compact('user'));
    }
}
