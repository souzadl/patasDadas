<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Usuário '.$user->username); ?></legend>
        <?php
            //echo $this->Form->control('nome', ['value'=>$user->pessoa->nome, 'required'=>true]);
            //echo $this->Form->control('email', ['value'=>$user->pessoa->email, 'required'=>true]);                                             
            echo $this->Form->control('pessoa.nome');
            echo $this->Form->control('pessoa.email');
            echo $this->Form->control('perfis_id', ['options' => $perfis]);
            echo $this->Form->control('login', ['readonly' => ($action === $this::EDIT)]);
            echo $this->Form->control('senha', ['value'=>'','type'=>'password']);
            echo $this->Form->control('confirm_senha', ['label'=>'Confirme Senha','type'=>'password']);
            echo $this->Form->control('ativo', ['type'=>'checkbox', 'checked'=>$user->ativo]);
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
