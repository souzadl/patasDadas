<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa[]|\Cake\Collection\CollectionInterface $pessoas
 */
?>
<h4><?= __('Pessoas') ?></h4>
<?= (in_array('add', $acoesPermitidas)) ? $this->Html->link(__('New'), ['action' => 'add']) : '' ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
            <th scope="col"><?= $this->Paginator->sort('roles_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= $this->Number->format($pessoa->id) ?></td>
            <td><?= h($pessoa->nome) ?></td>
            <td><?= $pessoa->has('user') ? h($pessoa->user->username) : '' ?></td>
            <td><?= $pessoa->has('role') ? $this->Html->link($pessoa->role->nome, ['controller' => 'Roles', 'action' => 'view', $pessoa->role->id]) : '' ?></td>
            <td><?= $this->SimOuNao($pessoa->active) ?></td>
            <td class="actions">
                <?= (in_array('view', $acoesPermitidas)) ? $this->Html->link(__('View'), ['action' => 'view', $pessoa->id]) : ''?>
                <?= (in_array('edit', $acoesPermitidas)) ? $this->Html->link(__('Edit'), ['action' => 'edit', $pessoa->id]) : ''?>
                <?= (in_array('delete', $acoesPermitidas)) ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Confirme a exclusão de {0}?', $pessoa->nome)]) : ''?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!--<?= $this->Paginator->first(__('first')) ?>-->
        <?= $this->Paginator->prev(__('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next')) ?>
        <!--<?= $this->Paginator->last(__('last')) ?>-->
    </ul>
</nav>
