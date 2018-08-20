<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosCategoria $produtosCategoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos Categorias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produtosCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($produtosCategoria) ?>
    <fieldset>
        <legend><?= __('Add Produtos Categoria') ?></legend>
        <?php
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
