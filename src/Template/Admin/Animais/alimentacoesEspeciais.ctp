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
        <ul class="list-group">
            <?php if(isset($prontuario->alimentacoesespeciais)){ foreach($prontuario->alimentacoesespeciais as $alimentacao): ?>                        
            <li class="list-group-item">
                <?=$alimentacao->descricao?> 
                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteAlimentacaoEspecial', $alimentacao->id, $prontuario->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $alimentacao->descricao)])?>
            </li>
            <?php endforeach;}?>                            
        </ul>
    </div>
</div>
