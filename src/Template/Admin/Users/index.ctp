<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<h4><?= __('Usuários') ?></h4>
<?= $this->Html->link(__('New'), ['action' => 'add']) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
            <th scope="col"><?= $this->Paginator->sort('roles_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <!--<th scope="col"><?= $this->Paginator->sort('changed') ?></th>-->
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= $user->has('role') ? $this->Html->link($user->role->nome, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
            <td><?= $this->SimOuNao($user->active) ?></td>
            <!--<td><?= h($user->changed) ?></td>-->
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
