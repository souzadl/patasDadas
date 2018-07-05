<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TiposAdotavei[]|\Cake\Collection\CollectionInterface $tiposAdotaveis
 */
?>
<h4><?= __('Tipos Adotáveis') ?></h4>
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
        <?php foreach ($tiposAdotaveis as $tipoAdotavel): ?>
        <tr>
            <td><?= $this->Number->format($tipoAdotavel->id) ?></td>
            <td><?= h($tipoAdotavel->nome) ?></td>
            <td><?= $this->SimOuNao($tipoAdotavel->active) ?></td>                
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $tipoAdotavel->id, 'descDel' => $tipoAdotavel->nome]) ?>
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
