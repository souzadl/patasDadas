<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Padrinho[]|\Cake\Collection\CollectionInterface $padrinhos
 */
?>
<h4><?= __('Padrinhos') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_padrinho') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($padrinhos as $padrinho): ?>
        <tr>
            <td><?= $this->Number->format($padrinho->id_padrinho) ?></td>
            <td><?= h($padrinho->nome) ?></td>
            <td><?= h($padrinho->email) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($padrinho->id_padrinho, $padrinho->nome, $acoesPermitidas)?> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
