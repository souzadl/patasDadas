<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle $controle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Controle'), ['action' => 'edit', $controle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Controle'), ['action' => 'delete', $controle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Controles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Controle'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="controles view large-9 medium-8 columns content">
    <h3><?= h($controle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($controle->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($controle->id) ?></td>
        </tr>
    </table>
</div>
