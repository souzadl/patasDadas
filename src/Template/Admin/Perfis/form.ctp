<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfl $perfl
 */
?>
<div class="perfis form large-9 medium-8 columns content">
    <?= $this->Form->create($perfil) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Perfil '.$perfil->nome); ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('ativo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
