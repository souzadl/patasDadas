<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aco[]|\Cake\Collection\CollectionInterface $acoes
 */
?>
<h4><?= __('Ações') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($acoes as $acao): ?>
        <tr>
            <td><?= $this->Number->format($acao->id) ?></td>
            <td><?= h($acao->nome) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($acao->id, $acao->nome, $acoesPermitidas)?>   
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
