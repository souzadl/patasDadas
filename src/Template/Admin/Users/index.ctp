<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<h4><?= __('Usuários') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
            <th scope="col"><?= $this->Paginator->sort('roles_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->pessoa->nome) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= $user->has('role') ? $this->Html->link($user->role->nome, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
            <td><?= $this->SimOuNao($user->active) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $user->id, 'descDel' => $user->username]) ?>
                <?= $this->element('acao_permissao', ['id' => $user->id]) ?>              
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
