<?php
namespace App\View\Helper;
use Cake\View\Helper;

/**
 * Description of LinkAddHelper
 *
 * @author souza
 */
class LinkAddHelper  extends Helper {
    public function get($view, $action, $dataTarget){
        return (isset($action) and $action === 'view') ? 
            $view->Html->tag('i','',['class'=>'fa fa-plus-circle']) : 
            $view->Html->Link($view->Html->tag('i','',['class'=>'fa fa-plus-circle']),
                '',
                ['escape'=>false, 'data-toggle'=>'modal', 'data-target' =>'#'.$dataTarget]);
    }
}
