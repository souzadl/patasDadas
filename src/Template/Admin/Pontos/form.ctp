<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto $ponto
 */
?>
<div class="pontos form large-9 medium-8 columns content">
    <?= $this->Form->create($ponto) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Ponto'); ?></legend>
        <?php
            //echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('ponto');
            echo $this->Form->control('endereco');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
