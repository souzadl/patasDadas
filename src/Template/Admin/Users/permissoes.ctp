<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Permissões para '.$user->username); ?></legend>
        <?php
            echo $this->Form->control('Selecionar Todos', ['type'=>'checkbox',
                'name'=>'selecionarTodos']);
            foreach($controles as $controle){
                $selOptions = array();
                foreach ($user->permissoes_users as $permissao){
                    if($controle->id === $permissao->controles_id){
                        $selOptions[] = $permissao->acoes_id;
                    }
                }  
                echo $this->Form->control($controle->nome, 
                      ['type'=>'multiCheckbox',                           
                          'options'=>$acoes,
                          'default'=>$selOptions]);    
            }
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$('document').ready(function(){
    $('input[id=selecionar-todos]').change(function(){
        var checked = $(this).is(':checked');
        //alert($(this).is(':checked'));
        $('input').each(function(){
            //your code here
            //alert('oi');
            $(this).attr('checked', checked);
        });
        //$('#textbox1').val($(this).is(':checked'));
    });

});
</script>
