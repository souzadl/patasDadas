<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController{
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        //$this->Auth->allow(['index']);
    }
    
    public function index()
    {
        //$home = $this->paginate($this->Home);

        //$this->set(compact('home'));
    }

    
}
