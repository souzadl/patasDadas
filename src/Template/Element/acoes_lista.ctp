<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>

    <?= $this->Html->link(
        $this->Html->tag('i','',['class'=>'fas fa-eye'])
        /*.__('View')*/, ['action' => 'view', $id], ['escape'=>false, 'alt'=>'Ver']) ?>
    <?= $this->Html->link(
        $this->Html->tag('i','',['class'=>'fas fa-edit'])
        /*.__('Edit')*/, ['action' => 'edit', $id], ['escape'=>false]) ?>
    <?= $this->Form->postLink(
        $this->Html->tag('i','',['class'=>'fas fa-trash-alt'])
        /*.__('Delete')*/, ['action' => 'delete', $id], ['escape'=>false, 'confirm' => __('Confime a exclusão do registro # {0}?', $id)]) ?>
