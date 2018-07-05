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
            if(in_array($pessoa->roles_id, $idsRolesUsuarios)){
                echo $this->Form->control('username', ['value'=>$pessoa->user->username, 'required'=>true]);                 
                echo (in_array($action, array('add', 'addPublic'))) ? $this->Form->control('password', ['required'=>true]) : '';                
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
        var userName = $("input[name=username]");
        var password = $("input[name=password]");
        if($.inArray(parseInt($(this).val()), [<?= implode(",", $idsRolesUsuarios)?>]) >= 0){
            Show(userName);
            Show(password); 
        }else{
            Hide(userName);
            Hide(password);            
        }
    });
});

function Show(input){
    input.parent().show();
    input.parent().addClass('required');
    input.attr('required', true);    
}
function Hide(input){
    input.parent().hide();
    input.parent().removeClass('required');
    input.attr('required', false);    
}    
</script>