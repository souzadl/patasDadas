<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>

    <?= (in_array('view', $acoesPermitidas) or in_array('all', $acoesPermitidas)) ? $this->Html->link(
            $this->Html->tag('i','',['class'=>'fas fa-eye'])
            /*.__('View')*/, ['action' => 'view', $id], ['escape'=>false]) : ''?>
    <?= (in_array('edit', $acoesPermitidas) or in_array('all', $acoesPermitidas)) ? $this->Html->link(
            $this->Html->tag('i','',['class'=>'fas fa-edit'])
            /*.__('Edit')*/, ['action' => 'edit', $id], ['escape'=>false]) : '' ?>
    <?= (in_array('delete', $acoesPermitidas) or in_array('all', $acoesPermitidas)) ? $this->Form->postLink(
            $this->Html->tag('i','',['class'=>'fas fa-trash-alt'])
            /*.__('Delete')*/, ['action' => 'delete', $id], ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $descDel)]) : '' ?>
