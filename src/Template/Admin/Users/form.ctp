<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Usuário '.$user->username); ?></legend>
        <?php
            //echo $this->Form->control('nome', ['value'=>$user->pessoa->nome, 'required'=>true]);
            //echo $this->Form->control('email', ['value'=>$user->pessoa->email, 'required'=>true]);
            //echo $this->Form->control('roles_id', ['options' => $roles]);                                 
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            if ($action != 'edit'){
                echo $this->Form->control('login');
            }
            echo $this->Form->control('senha', ['value'=>'']);
            echo $this->Form->control('confirm_senha', ['label'=>'Confirme Senha']);
            echo $this->Form->control('ativo', ['type'=>'checkbox', 'checked'=>($user->ativo == 'S' ? true : false)]);
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
