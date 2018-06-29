<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Usuário'); ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('roles_id', ['options' => $roles]);            
            echo $this->Form->control('username');            
            if($action === 'add'){
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
    // Put your ``var id = `` code in here.
    var Roles = $("input[name='data[User][roles_id]']");
    $("select[name=roles_id]").on('change', function(){
        //Padrinho ou Adotante
        if($(this).val() == 3 || $(this).val() == 4){
            $("input[name=username]").parent().hide();
            $("input[name=password]").parent().hide();
        }else{
            $("input[name=username]").parent().show();
            $("input[name=password]").parent().show();            
        }
    });
    //alert(Roles);
});
</script>