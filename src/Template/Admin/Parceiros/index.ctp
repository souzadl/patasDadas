<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parceiro[]|\Cake\Collection\CollectionInterface $parceiros
 */
?>
<h4><?= __('Parceiros') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_parceiro') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parceiros as $parceiro): ?>
        <tr>
            <td><?= $this->Number->format($parceiro->id_parceiro) ?></td>
            <td><?= h($parceiro->nome) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($parceiro->id_parceiro, $parceiro->nome, $acoesPermitidas)?>  
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

