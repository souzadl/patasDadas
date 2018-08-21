<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto[]|\Cake\Collection\CollectionInterface $pontos
 */
?>
<h4><?= __('Pontos') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_ponto', ['label'=>'Id']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('ponto') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pontos as $ponto): ?>
        <tr>
            <td><?= $this->Number->format($ponto->id_ponto) ?></td>
            <td><?= h($ponto->ponto) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($ponto->id_ponto, $ponto->ponto, $acoesPermitidas)?> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>