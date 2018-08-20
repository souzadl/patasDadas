<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosCategoria[]|\Cake\Collection\CollectionInterface $produtosCategorias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Categoria'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosCategorias index large-9 medium-8 columns content">
    <h3><?= __('Produtos Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_produto_categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosCategorias as $produtosCategoria): ?>
            <tr>
                <td><?= $this->Number->format($produtosCategoria->id_produto_categoria) ?></td>
                <td><?= h($produtosCategoria->data_alteracao) ?></td>
                <td><?= h($produtosCategoria->categoria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosCategoria->id_produto_categoria]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosCategoria->id_produto_categoria]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosCategoria->id_produto_categoria], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosCategoria->id_produto_categoria)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
