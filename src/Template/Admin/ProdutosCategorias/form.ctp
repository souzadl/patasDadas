<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosCategoria $produtosCategoria
 */
?>
<div class="produtosCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Categoria Produto'); ?></legend>
        <?php
            echo $this->Form->control('categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
