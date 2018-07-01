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
            echo $this->Form->control('roles_id', ['options' => $roles]);                                 
            if($action === 'add'){
                echo $this->Form->control('username');
                echo $this->Form->control('password');
            }
            echo $this->Form->control('active');
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$('document').ready(function(){    
    $("select[name=roles_id]").on('change', function(){        
        //Padrinho ou Adotante
        if($(this).val() == 3 || $(this).val() == 4){
            $("input[name=username]").parent().hide();
            $("input[name=username]").parent().removeClass('required');
            $("input[name=username]").attr('required', false);
            $("input[name=password]").parent().hide();
            $("input[name=password]").parent().removeClass('required');
            $("input[name=password]").attr('required', false);
        }else{
            $("input[name=username]").parent().show();
            $("input[name=username]").parent().addClass('required');
            $("input[name=username]").attr('required', true);
            $("input[name=password]").parent().show();            
            $("input[name=password]").parent().addClass('required');
            $("input[name=password]").attr('required', true);
        }
    });
    //alert(Roles);
});
</script>