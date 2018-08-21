<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Midia[]|\Cake\Collection\CollectionInterface $midias
 */
?>
<h4><?= __('Mídias') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_midia') ?></th>
            <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($midias as $midia): ?>
        <tr>
            <td><?= $this->Number->format($midia->id_midia) ?></td>
            <td><?= h($midia->titulo) ?></td>
            <td><?= h($midia->tipo) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($midia->id_midia, $midia->titulo, $acoesPermitidas)?> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
