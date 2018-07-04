<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<?= (in_array('add', $acoesPermitidas) or in_array('all', $acoesPermitidas)) ? $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-plus-square'])/*.__('New')*/, ['action' => 'add'], ['escape'=>false]) : ''?>
