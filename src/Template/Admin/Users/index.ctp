<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<h4><?= __('Usuários') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
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
            <td><?= ($user->pessoa) ? h($user->pessoa->nome) : ''?></td>
            <td><?= h($user->login) ?></td>            
            <td><?= $user->ativo ? __('Sim') : __('Não') ?></td>
            <td class="actions">
            	<?= $this->Acoes->getAll($user->id_usuario, $user->login, $acoesPermitidas)?>                          
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
