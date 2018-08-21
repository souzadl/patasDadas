<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parceiro $parceiro
 */
use Cake\Core\Configure;
?>
<div class="parceiros form large-9 medium-8 columns content">
    <?= $this->Form->create($parceiro) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Parceiro'); ?></legend>
        <?php
            //echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('nome');
            echo $this->Html->image(Configure::read('App.imageParceiroUrl') . $parceiro->logo, ['style'=>'width:100px']);
            echo $this->Form->control('logo', ['label' => '', 'type' => 'file']);
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
