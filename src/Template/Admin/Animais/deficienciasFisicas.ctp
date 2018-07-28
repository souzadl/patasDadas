<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Deficiências Físicas <a href="#" data-toggle="modal" data-target="#deficienciaFisicaDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <?php 
        if(isset($animal->prontuario->deficienciasfisicas)){ 
            foreach($animal->prontuario->deficienciasfisicas as $index => $deficiencia){
                echo $deficiencia->descricao.' '.
                    $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteDeficienciaFisica', $deficiencia->id, $animal->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $deficiencia->descricao)]);
                echo ($index < count($animal->prontuario->deficienciasfisicas)-1) ? ' | ' : '';
            }
        }
        ?>        
    </div>
</div>
