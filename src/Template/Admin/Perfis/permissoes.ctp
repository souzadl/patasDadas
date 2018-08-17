<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="perfis form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Permissões para '.$perfil->nome); ?></legend>
        <?php
            echo $this->Form->control('Selecionar Todos', ['type'=>'checkbox',
                'name'=>'selecionarTodos']);
             
            
            foreach($controles as $controle){              
                $options = array();
                foreach($controle->acoes as $acao){
                    //debug($acao->_joinData->id);
                    $options[$acao->_joinData->id] = $acao->nome;
                }
                $selOptions = array();
                //debug($perfil->acoes_controles);
                foreach ($perfil->acoes_controles as $permissao){
                    //debug($permissao);
                    if($permissao->controles_id === $controle->id){
                        $selOptions[] = $permissao->id;
                    }
                }                 
                echo $this->Form->control($controle->nome,[
                    //'name'=>'acoes_controles._ids',
                    'type'=>'multiCheckbox',                           
                    'options'=>$options,
                    'default'=>$selOptions,
                    'label'=>['style'=>'width: 150px;'],
                    'templates'=>[
                        'checkboxContainer'=>'<div class="form-group form-check form-check-inline">{{content}}</div>',
                        'checkbox'=>'<input type="checkbox" class="form-check-input" name="{{name}}" value="{{value}}"{{attrs}}>',
                        'checkboxWrapper'=>'<div class="checkbox">{{label}}</div>',
                        'nestingLabel'=>'{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>'
                    ]
                ]);    
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
