<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TiposPadrinho[]|\Cake\Collection\CollectionInterface $tiposPadrinhos
 */
?>
<h4><?= __('Tipos Padrinhos') ?></h4>
<?= $this->Html->link(__('New'), ['action' => 'add']) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tiposPadrinhos as $tiposPadrinho): ?>
        <tr>
            <td><?= $this->Number->format($tiposPadrinho->id) ?></td>
            <td><?= h($tiposPadrinho->nome) ?></td>
            <td><?= $this->SimOuNao($tiposPadrinho->active) ?></td>            
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $tiposPadrinho->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tiposPadrinho->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tiposPadrinho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiposPadrinho->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!--<?= $this->Paginator->first(__('first')) ?>-->
        <?= $this->Paginator->prev(__('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next')) ?>
        <!--<?= $this->Paginator->last(__('last')) ?>-->
    </ul>
</nav>
