<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosCategoria $produtosCategoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Categoria'), ['action' => 'edit', $produtosCategoria->id_produto_categoria]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Categoria'), ['action' => 'delete', $produtosCategoria->id_produto_categoria], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosCategoria->id_produto_categoria)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Categoria'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosCategorias view large-9 medium-8 columns content">
    <h3><?= h($produtosCategoria->id_produto_categoria) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($produtosCategoria->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Produto Categoria') ?></th>
            <td><?= $this->Number->format($produtosCategoria->id_produto_categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($produtosCategoria->data_alteracao) ?></td>
        </tr>
    </table>
</div>
