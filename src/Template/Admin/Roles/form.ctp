<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Perfil'); ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('active');
        ?>
        
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
