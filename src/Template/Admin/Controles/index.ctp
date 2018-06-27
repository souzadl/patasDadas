<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle[]|\Cake\Collection\CollectionInterface $controles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Controle'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="controles index large-9 medium-8 columns content">
    <h3><?= __('Controles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($controles as $controle): ?>
            <tr>
                <td><?= $this->Number->format($controle->id) ?></td>
                <td><?= h($controle->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $controle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $controle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $controle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
