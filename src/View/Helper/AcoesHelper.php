<?php
namespace App\View\Helper;
use Cake\View\Helper;
use App\View\AppView;

class AcoesHelper  extends Helper
{
    public $helpers = ['Html', 'Form'];
    
    public function initialize($config){
        //
    }
    
    private function acaoPermitida($acao, $acoesPermitidas){
        return (in_array($acao, $acoesPermitidas) or in_array('all', $acoesPermitidas));
    }
    
    private function makeView($id, $acoesPermitidas){        
        return ($this->acaoPermitida(AppView::VIEW, $acoesPermitidas)) ? $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-eye']), ['action' => AppView::VIEW, $id], ['escape'=>false]) : '';
    }
    
    private function makeEdit($id, $acoesPermitidas){
        return ($this->acaoPermitida(AppView::EDIT, $acoesPermitidas)) ? $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-edit']), ['action' => AppView::EDIT, $id], ['escape'=>false]) : '';        
    }
    
    private function makeDelete($id, $descDel, $acoesPermitidas){
        return ($this->acaoPermitida(AppView::DELETE, $acoesPermitidas)) ? $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']), ['action' => AppView::DELETE, $id], ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $descDel)]) : '';
    }
    
    private function makePermissoes($id, $acoesPermitidas){
        return ($this->acaoPermitida(AppView::PERMISSOES, $acoesPermitidas)) ? $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-lock']),['action' => AppView::PERMISSOES, $id],['escape'=>false]) : '';   
    }
    
    public function getAdd($acoesPermitidas){
        return ($this->acaoPermitida(AppView::ADD, $acoesPermitidas)) ? $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-plus-square']), ['action' => AppView::ADD], ['escape'=>false]) : '';
    }
    

    public function getAll($id, $descDel, $acoesPermitidas){
        return $this->makeView($id, $acoesPermitidas)
        . $this->makeEdit($id, $acoesPermitidas)
        . $this->makeDelete($id, $descDel, $acoesPermitidas)
        . $this->makePermissoes($id, $acoesPermitidas);
    }
}

