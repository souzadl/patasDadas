<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TiposAdotavei $tiposAdotavei
 */
?>
<div class="tiposAdotaveis form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoAdotavel) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Tipo Adotável'); ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
