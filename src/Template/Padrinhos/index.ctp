<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Padrinho[]|\Cake\Collection\CollectionInterface $padrinhos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Padrinho'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adotaveis'), ['controller' => 'Adotaveis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adotavei'), ['controller' => 'Adotaveis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos Padrinhos'), ['controller' => 'TiposPadrinhos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipos Padrinho'), ['controller' => 'TiposPadrinhos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padrinhos index large-9 medium-8 columns content">
    <h3><?= __('Padrinhos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_padrinho') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facebook') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($padrinhos as $padrinho): ?>
            <tr>
                <td><?= $this->Number->format($padrinho->id_padrinho) ?></td>
                <td><?= h($padrinho->data_alteracao) ?></td>
                <td><?= h($padrinho->nome) ?></td>
                <td><?= h($padrinho->email) ?></td>
                <td><?= h($padrinho->telefone) ?></td>
                <td><?= h($padrinho->cpf) ?></td>
                <td><?= h($padrinho->rg) ?></td>
                <td><?= h($padrinho->endereco) ?></td>
                <td><?= h($padrinho->cidade) ?></td>
                <td><?= h($padrinho->estado) ?></td>
                <td><?= h($padrinho->cep) ?></td>
                <td><?= h($padrinho->facebook) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $padrinho->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $padrinho->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $padrinho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padrinho->id)]) ?>
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
