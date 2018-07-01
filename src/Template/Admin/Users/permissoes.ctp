<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Permissões para '.$nomeUser); ?></legend>
        <?php
            echo $this->Form->control('Selecionar Todos', ['type'=>'checkbox',
                'name'=>'selecionarTodos']);
            $options = array();
            foreach($acoes as $acao){
                $options[$acao->id] = $acao->nome;
            }
            foreach($controles as $controle){
                $selOptions = array();
                foreach ($controle->permissoes as $permControle){
                    $selOptions[] = $permControle->acoes_id;
                }  
                echo $this->Form->control($controle->nome, 
                      ['type'=>'multiCheckbox',                           
                          'options'=>$options,
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
