<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conteudo[]|\Cake\Collection\CollectionInterface $conteudos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conteudo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conteudos index large-9 medium-8 columns content">
    <h3><?= __('Conteudos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_conteudo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arquivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facebook') ?></th>
                <th scope="col"><?= $this->Paginator->sort('twitter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('instagram') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conteudos as $conteudo): ?>
            <tr>
                <td><?= $this->Number->format($conteudo->id_conteudo) ?></td>
                <td><?= h($conteudo->data_alteracao) ?></td>
                <td><?= h($conteudo->arquivo) ?></td>
                <td><?= h($conteudo->email) ?></td>
                <td><?= h($conteudo->imagem) ?></td>
                <td><?= h($conteudo->facebook) ?></td>
                <td><?= h($conteudo->twitter) ?></td>
                <td><?= h($conteudo->instagram) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conteudo->id_conteudo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conteudo->id_conteudo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conteudo->id_conteudo], ['confirm' => __('Are you sure you want to delete # {0}?', $conteudo->id_conteudo)]) ?>
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
