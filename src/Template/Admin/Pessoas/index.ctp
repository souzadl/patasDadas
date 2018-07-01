<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa[]|\Cake\Collection\CollectionInterface $pessoas
 */
?>
<h4><?= __('Pessoas') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
            <th scope="col"><?= $this->Paginator->sort('roles_id', ['Perfil']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= h($pessoa->nome) ?></td>
            <td><?= $pessoa->has('user') ? h($pessoa->user->username) : '' ?></td>
            <td><?= $pessoa->has('role') ? $this->Html->link($pessoa->role->nome, ['controller' => 'Roles', 'action' => 'view', $pessoa->role->id]) : '' ?></td>
            <td><?= $this->SimOuNao($pessoa->active) ?></td>
            <td class="actions"> <?= $this->element('acoes_lista', ['id' => $pessoa->id]) ?> </td>   
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>

