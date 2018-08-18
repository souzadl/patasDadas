<?php
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Core\Configure;

class ControleHelper  extends Helper
{
    public function TemAcesso($controle, $userAuth){
        //debug($acoesControles);
        if($userAuth['perfil']['id'] == Configure::read('App.idPerfilAdmin')){
            $temAcesso = true;
        }else{
            $temAcesso = false;
            foreach($userAuth['perfil']['acoes_controles'] as $permissao){
                if($permissao['controle']['nome'] == $controle){
                    $temAcesso = true;
                }
            }
        }
        return $temAcesso;
    }
}
?>

