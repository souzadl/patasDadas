<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadHelper('Paginator', ['templates' => 'paginator-templates']);
        $this->loadHelper('Form', ['templates' => 'form-templates']);
    }
    
    protected function SimOuNao($var){
        return ($var) ? __('Sim') : __('Não');
    }
    
    protected function RotuloAcao($action, $label){
        switch ($action){
            case 'add': 
            case 'addPublic': 
                $rotulo = __('Adicionar'); 
                break;
            case 'edit': 
                $rotulo = __('Editar'); 
                break;
            case 'view': 
                $rotulo = __('Visualizar'); 
                break;            
        }
        return $rotulo .' '. $label;   
    }
    
    protected function ShowAcoes($acoesPermitidas){
        return (trim($this->ShowLinksAcoes($acoesPermitidas)) <> '') 
            ? '<th scope="col" class="actions">'.__('Actions').'</th>'
            : '';
    }
    
    protected function ShowLinkAdd($acoesPermitidas){
        $links = '';
        if (is_array($acoesPermitidas) and count($acoesPermitidas) >= 1) {   
            $links = (in_array('add', $acoesPermitidas)) ? $this->Html->link(__('New'), ['action' => 'add']) : '';
        }
        return $links;
    }     
    
    protected function ShowLinksAcoes($acoesPermitidas){
        $links = '';
        if (is_array($acoesPermitidas) and count($acoesPermitidas) >= 1) {
            $links .= (in_array('view', $acoesPermitidas)) ? $this->Html->link(__('View'), ['action' => 'view', $user->id]) : '';
            $links .= (in_array('edit', $acoesPermitidas)) ? $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) : '';
            $links .= (in_array('delete', $acoesPermitidas)) ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) : '';
            $links .= (in_array('permissoes', $acoesPermitidas)) ? $this->Html->link(__('Permissões'), ['action' => 'permissoes', $user->id]) : '';
        }
        $td = '';
        if(trim($links) <> ''){
            $td = '<td class="actions">';    
            $td .= $links;
            $td .= '</td>';        
        }
        return $td;
    }
    
    
}
