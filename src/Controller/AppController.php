<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller{
    var $acoesPermitidas = array();
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize(){
        parent::initialize();
        
        $this->loadModel('Permissoes');
        $this->loadModel('Adotaveis');               
        
        $this->paginate['limit'] = Configure::read('App.limitPagination');
        //$this->paginate['maxLimit'] = 2;
        //$this->helpers['templates'] = 'paginator-templates';
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);        
        $this->loadComponent('Flash');
        //$this->loadComponent('Paginator');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'finder' => 'auth'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Home',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Home',
                'action' => 'index'
            ],
            'authorize' => 'Controller'
        ]);
        
        

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        
        $this->carregarPermissoesController();
    }
    
    public function isAuthorized($user){  
        if($user['roles_id'] == Configure::read('App.idRoleSistema')){
          $permitido = true;
        }else{          
          $permissoes = $this->Permissoes->find('all')
              ->where(['users_id ='=>$user['id']])
              ->contain(['Acoes', 'Controles', 'Users']);
          $action = $this->request->getParam('action');
          $controller = $this->request->getParam('controller');
          $permitido = false;
          foreach ($permissoes as $permissao){
              if(isset($permissao->controle)
                and isset($permissao->aco)
                and $controller === $permissao->controle->nome 
                and $action === $permissao->aco->nome){
                $permitido = true;
              }              
          }
        }  
        return $permitido;     
    }
    
    public function beforeFilter(Event $event) {
        $this->set('username', $this->Auth->user('username'));
    }
    
    private function carregarPermissoesController(){
        /*$permissoes = $this->Permissoes->find('all')
              ->where(['users_id ='=>$this->Auth->user('id'),
                  'controles_id ='=>])
              ->contain(['Acoes', 'Controles', 'Users']);   */
        $this->acoesPermitidas = array('add', 'edit', 'delete', 'view', 'permissoes');
        
    }

}
