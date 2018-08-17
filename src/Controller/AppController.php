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
    private $label;
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
        
        //$this->loadModel('PermissoesUsers');
        $this->loadModel('PermissoesPerfis');
        //$this->loadModel('Controles');
        //$this->loadModel('Acoes');
        //$this->loadModel('Adotaveis');               
        
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
                        'username' => 'login',
                        'password' => 'senha'
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
    }
    
    public function isAuthorized($user){         
        if($user['perfil']['id'] == Configure::read('App.idPerfilAdmin')){
            $permitido = true; 
            $this->set('acoesPermitidas', array('all'));            
        }else{        
            $permitido = false;
            $acoesPermitidas = array();
            foreach($user['perfil']['acoes_controles'] as $acaoControle){
                if($this->request->getParam('controller') == $acaoControle['controle']['nome']){
                    if($this->request->getParam('action') == $acaoControle['acao']['nome']){                
                        $permitido = true;
                    }
                    $acoesPermitidas[] = $acaoControle['acao']['nome'];
                }
            } 
            $this->set('acoesPermitidas', $acoesPermitidas);          
        }  
        //$permitido = true; 
        //$this->set('acoesPermitidas', array('all'));  
        return $permitido;     
    }
    
    public function beforeFilter(Event $event) {
        $this->set('userAuth', $this->Auth->user());
    }   

}
