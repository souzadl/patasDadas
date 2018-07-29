<?php
namespace App\View\Helper;
use Cake\View\Helper;

/**
 * Description of LinkAddHelper
 *
 * @author souza
 */
class LinkDelHelper  extends Helper {
    public function get($view, $actionRequest, $action, $id, $desc, $idAnimal){
        return (isset($actionRequest) and $actionRequest === 'view') ? 
            $view->Html->tag('i','',['class'=>'fa fa-trash-alt']) : 
            $view->Form->postLink($view->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                ['action' => $action, $id, $idAnimal], 
                ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $desc)]);
    }
}
