<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Alimentações Especiais <a href="#" data-toggle="modal" data-target="#alimentacaoEspecialDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <?php 
        if(isset($animal->prontuario->alimentacoesespeciais)){ 
            foreach($animal->prontuario->alimentacoesespeciais as $index=>$alimentacao){
                echo $alimentacao->descricao.' '.
                    $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteAlimentacaoEspecial', $alimentacao->id, $animal->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $alimentacao->descricao)]);
                echo ($index < count($animal->prontuario->alimentacoesespeciais)-1) ? ' | ' : '';
            }            
        }
        ?>    
    </div>
</div>
