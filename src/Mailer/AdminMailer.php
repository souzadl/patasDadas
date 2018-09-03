<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use \Cake\Mailer\Email;

/**
 * User mailer.
 */
class AdminMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Admin';
    
    public function novoUsuario($user){ 
        
        $this->to(Email::getConfig('patasdadas')['from'])
            ->profile('patasdadas')
            ->emailFormat('html')
            ->template('novo_usuario')
            ->layout('default')
            ->viewVars(['nome' => $user->name])
            ->subject(sprintf('Novo Usuário, %s', $user->name));
    }
    
    public function testeMail(){
        $this->to('souzadl@gmail.com')
            ->profile('kinghost')
            ->emailFormat('html')
            ->template('novo_usuario')
            ->layout('default')
            ->viewVars(['nome' => 'Diego Lemos de Souza'])
            ->subject(sprintf('Novo Usuário, %s', 'souzadl'));        
    }
    
}
