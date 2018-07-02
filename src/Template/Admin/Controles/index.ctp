<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle[]|\Cake\Collection\CollectionInterface $controles
 */
?>
<h4><?= __('Controles') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($controles as $controle): ?>
        <tr>
            <td><?= $this->Number->format($controle->id) ?></td>
            <td><?= h($controle->nome) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $controle->id]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
