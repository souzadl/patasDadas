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
            </div>
            <div class="col">
                <?= $this->Form->control('apto_evento', ['type'=>'checkbox', 'label'=>'Apto para Evento']);?>
            </div>
        </div>    
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Alterações de Saúde <a href="#" data-toggle="modal" data-target="#alteracaoDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <?php include_once "alteracoesSaude.ctp"?>                      
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Castração
                    </div>
                    <div class="card-body">
                        <?= $this->Form->control('castrado', ['type'=>'radio', 
                            'options'=>['P' => 'Pelo Patas', 'T' => 'Por Terceiro'],
                            'templates' => ['nestingLabel'=>'{{hidden}}<div class="custom-control custom-radio">{{input}}<label{{attrs}} class="custom-control-label">{{text}}</label></div>']
                        ]) ?>
                        <?= $this->Form->control('clinica_castracao', ['label'=>'Clínica', 'type'=>'select']) ?>
                        <?= $this->Form->control('data_castracao', ['label' => 'Data Castração', 'type'=>'date']) ?>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vacinas <a href="#" data-toggle="modal" data-target="#vacinaDialog"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <i class="fa fa-circle fa-fw" style="color: <?=$prontuario->proximaVacinaCor?>;"></i> Próxima:  <?=$prontuario->proximaVacina->format('d/m/Y')?>
                        <ul class="list-group">
                            <?php if(isset($prontuario->vacinas)){ foreach ($prontuario->vacinas as $vacina):?>
                            <li class="list-group-item">
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
                        <i class="fa fa-circle fa-fw" style="color: <?=$prontuario->proximaSerestoCor?>;"></i> Próxima: <?=$prontuario->proximoSeresto->format('d/m/Y')?>
                        <ul class="list-group">
                            <?php if(isset($prontuario->serestos)){ foreach ($prontuario->serestos as $seresto):?>
                            <li class="list-group-item">
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
                        <i class="fa fa-circle fa-fw" style="color: <?=$prontuario->proximoVermifugoCor?>;"></i> Próxima: <?=$prontuario->proximoVermifugo->format('d/m/Y')?>
                        <ul class="list-group">
                            <?php if(isset($prontuario->vermifugos)){ foreach ($prontuario->vermifugos as $vermifugo):?>
                            <li class="list-group-item">
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

        </div>
    </div>
 </div>