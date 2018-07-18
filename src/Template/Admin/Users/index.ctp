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
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('login') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ativo') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->nome) ?></td>
            <td><?= h($user->login) ?></td>            
            <td><?= h($user->ativo) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $user->id_usuario, 'descDel' => $user->login]) ?>
                <?= $this->element('acao_permissao', ['id' => $user->id_usuario]) ?>              
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
