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
        <ul class="list-group">
            <?php if(isset($prontuario->deficienciasfisicas)){ foreach($prontuario->deficienciasfisicas as $deficiencia): ?>                        
            <li class="list-group-item">
                <?=$deficiencia->descricao?> 
                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteDeficienciaFisica', $deficiencia->id, $prontuario->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $deficiencia->descricao)])?>
            </li>
            <?php endforeach;}?>                             
        </ul>  
    </div>
</div>
