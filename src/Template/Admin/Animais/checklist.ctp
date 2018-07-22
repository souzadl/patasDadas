<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Checklist
    </div>
    <div class="card-body">     
        <div class="row">
            <div class="col">
                <?= $this->Form->control('apto_adocao', ['type'=>'checkbox', 'label'=>'Apto para Adoção']);?>
                <?= $this->Form->control('apto_evento', ['type'=>'checkbox', 'label'=>'Apto para Evento']);?>
            </div>
            <div class="col">
                <?= $this->Form->control('castrado_pelo_patas', ['label'=>'Castrado Pelo Patas', 'type'=>'checkbox']) ?>
                <?= $this->Form->control('clinica', ['label'=>'Clínica', 'type'=>'select']) ?>
            </div>
        </div>    
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vacinas <a href="#" data-toggle="modal" data-target="#vacinaDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php if(isset($prontuario->vacinas)){ foreach ($prontuario->vacinas as $vacina):?>
                            <li>
                                <?=$vacina->nome .'-'.$vacina->data_aplicacao?>
                                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                                    ['action' => 'deleteVacina', $vacina->id, $prontuario->id_animal], 
                                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $vacina->data_aplicacao)])?>
                            </li>
                            <?php endforeach;}?>
                        </ul>                        
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Seresto <a href="#" data-toggle="modal" data-target="#serestoDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php if(isset($prontuario->serestos)){ foreach ($prontuario->serestos as $seresto):?>
                            <li>
                                <?=$seresto->data_aplicacao?>
                                 <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                                    ['action' => 'deleteSeresto', $seresto->id, $prontuario->id_animal], 
                                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $seresto->data_aplicacao)])?>
                            </li>
                            <?php endforeach;}?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vermífugo <a href="#" data-toggle="modal" data-target="#vermifugoDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php if(isset($prontuario->vermifugos)){ foreach ($prontuario->vermifugos as $vermifugo):?>
                            <li>
                                <?=$vermifugo->data_aplicacao?>
                                 <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                                    ['action' => 'deleteVermifugo', $vermifugo->id, $prontuario->id_animal], 
                                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $vermifugo->data_aplicacao)])?>
                            </li>
                            <?php endforeach;}?>
                        </ul>                       
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Alterações de Saúde <a href="#" data-toggle="modal" data-target="#alteracaoDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>            

        </div>
    </div>
 </div>