<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Padrinho $padrinho
 */
?>
<div class="padrinhos form large-9 medium-8 columns content">
    <?= $this->Form->create($padrinho) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Padrinho'); ?></legend>
        <?php
            //echo $this->Form->control('id_padrinho');
            //echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
            echo $this->Form->control('cpf');
            echo $this->Form->control('rg');
            echo $this->Form->control('endereco');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
            echo $this->Form->control('cep');
            echo $this->Form->control('facebook');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
