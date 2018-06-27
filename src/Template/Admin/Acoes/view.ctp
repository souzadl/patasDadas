<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aco $aco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aco'), ['action' => 'edit', $aco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aco'), ['action' => 'delete', $aco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Acoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aco'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="acoes view large-9 medium-8 columns content">
    <h3><?= h($aco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($aco->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aco->id) ?></td>
        </tr>
    </table>
</div>
