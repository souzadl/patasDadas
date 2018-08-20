<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
use Cake\Core\Configure;
?>
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto, ['type' => 'file']) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Produto'); ?></legend>
        <?php
            echo $this->Form->control('id_produto_categoria', ['label' => 'Categoria', 'options' => $categorias]);
            //echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Html->image(Configure::read('App.imageProdutoUrl') . $produto->imagem, ['style'=>'width:100px']);
            echo $this->Form->control('imagem', ['label' => '', 'type' => 'file']);
            echo $this->Form->control('valor');
            echo $this->Form->control('peso');            
            echo $this->Form->control('ativo', ['type' => 'checkbox']);
            echo $this->Form->control('destaque', ['label' =>'Mostar esse produto como DESTAQUE?', 'type' => 'checkbox']);            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
