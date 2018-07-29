<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';
    
    public function welcome($user){
        $this->to($user->email)
            ->profile('patasdadas')
            ->emailFormat('html')
            ->template('welcome_email_template')
            ->layout('default')
            ->viewVars(['nome' => $user->name])
            ->subject(sprintf('Bem-vindo, %s', $user->name));
    }
    
    public function recovery($user){
        $this->to($user->email)
            ->profile('patasdadas')
            ->emailFormat('html')
            ->template('recovery_email_template')
            ->layout('default')
            ->viewVars(['nome' => $user->nome, 
                'email' => $user->email,
                'url' => Router::url(array("controller"=>"users","action"=>"changePassword", $user->email, $user->hash),true)])
            ->subject('Recuperação de senha');
    }
}
