<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Doenças Crônicas <a href="#" data-toggle="modal" data-target="#doencaCronicaDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <?php if(isset($prontuario->doencascronicas)){ foreach($prontuario->doencascronicas as $doenca): ?>                        
            <li class="list-group-item">
                <?=$doenca->descricao?> 
                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteDoencaCronica', $doenca->id, $prontuario->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $doenca->descricao)])?>
            </li>
            <?php endforeach;}?>
        </ul>
    </div>
</div>
