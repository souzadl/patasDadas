<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Midia $midia
 */
use Cake\Core\Configure;
?>
<div class="midias form large-9 medium-8 columns content">
    <?= $this->Form->create($midia, ['type' => 'file']) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Mídia'); ?></legend>
        <?php
            //echo $this->Form->control('data_alteracao', ['empty' => true]);
            //echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('titulo');
            echo $this->Html->image(Configure::read('App.imageMidiaUrl') . $midia->imagem, ['style'=>'width:100px']);
            echo $this->Form->control('imagem', ['label' => '', 'type' => 'file']);            
            echo $this->Form->control('tipo');
            echo $this->Form->control('link');
            echo $this->Form->control('arquivo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
