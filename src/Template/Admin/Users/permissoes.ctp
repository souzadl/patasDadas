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
            //$optionsCheck = ['label'=>'checkbox'];
            //echo $this->Form->control('Label de teste');
            //echo $this->Form->control('Teste', ['type'=>'multiCheckbox', 'options'=>['0'=>'Teste','1'=>'Teste1']]);
            //echo $this->Form->control('Teste2', ['type'=>'multiCheckbox']);

            foreach($acoes as $acao){
                $options[$acao->id] = $acao->nome;
            }
            foreach($controles as $controle){
                $selOptions = array();
                foreach ($controle->permissoes as $permControle){
                    $selOptions[] = $permControle->acoes_id;
                }                              
                //echo $this->Form->select($controle->nome, $acoes, ['label'=>$controle->nome]);
                //echo $this->Form->multiCheckbox($controle->nome, $acoes, ['text' => $controle->nome]);
                echo $this->Form->control($controle->nome, 
                      ['type'=>'multiCheckbox',                           
                          'options'=>$options,
                          'default'=>$selOptions]);    
                /*echo $this->Form->control('permissoes', ['type' => 'checkbox', 
                    'label' => $controle->nome, 
                    'options' => ['M'=>'M', 'F'=>'F']]);*/
            }
        ?>    
    </fieldset>   
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
