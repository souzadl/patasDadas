<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Mudar Senha') ?></legend>
        <?php
            echo $this->Form->control('id_usuario', ['type' => 'hidden']);    
            echo $this->Form->control('senha', ['value'=>'', 'type' => 'password']);            
            echo $this->Form->control('confirm_senha', ['type' => 'password', 'label' => 'Confirme']);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
