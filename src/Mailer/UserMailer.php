<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

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
        $this->to($user[0]['email'])
            ->profile('patasdadas')
            ->emailFormat('html')
            ->template('recovery_email_template')
            ->layout('default')
            ->viewVars(['nome' => $user[0]['name'], 'email' => $user[0]['email'],
                'hash' => substr($user[0]['password'], 0, 25)])
            ->subject('Recuperação de senha');
    }
}
