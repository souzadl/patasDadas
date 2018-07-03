<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoa) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Pessoa'); ?></legend>
        <?php             
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('roles_id', ['options' => $roles]);                        
            if(!in_array($pessoa->roles_id, $idsRolesUsuarios)){
                echo $this->Form->control('username', ['value'=>$pessoa->user->username, 'required'=>true]);                 
                echo (in_array($action, array('add', 'addPublic'))) ? $this->Form->control('password') : '';                
            }
            echo ($showActive) ? $this->Form->control('active') : '';
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$('document').ready(function(){
    $("select[name=roles_id]").on('change', function(){
        if($.inArray(parseInt($(this).val()), [<?= implode(",", $idsRolesUsuarios)?>]) >= 0){
            $("input[name=username]").parent().show();
            $("input[name=username]").parent().addClass('required');
            $("input[name=username]").attr('required', true);
            $("input[name=password]").parent().show();            
            $("input[name=password]").parent().addClass('required');
            $("input[name=password]").attr('required', true);            
        }else{
            $("input[name=username]").parent().hide();
            $("input[name=username]").parent().removeClass('required');
            $("input[name=username]").attr('required', false);
            $("input[name=password]").parent().hide();
            $("input[name=password]").parent().removeClass('required');
            $("input[name=password]").attr('required', false);
        }
    });
    //alert(Roles);
});
</script>