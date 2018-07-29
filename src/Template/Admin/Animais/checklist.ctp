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
                <?= $this->Form->control('prontuario.apto_adocao', ['type'=>'checkbox', 'label'=>'Apto para Adoção']);?>                
            </div>
            <div class="col">
                <?= $this->Form->control('prontuario.apto_evento', ['type'=>'checkbox', 'label'=>'Apto para Evento']);?>
            </div>
        </div>    
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        Alterações de Saúde <?=$this->LinkAdd->get($this, $action, 'alteracaoDialog')?>
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
                        <?= $this->Form->control('prontuario.castracao.castrado_por_patas', ['type'=>'checkbox', 
                            'label'=>'Castrado pelo Patas Dadas'
                        ]) ?>
                        <?= $this->Form->control('prontuario.castracao.clinicas_id', ['label'=>'Clínica', 'type'=>'select','options'=>$clinicas,'empty'=>true]) ?>
                        <?= $this->Form->control('prontuario.castracao.data', ['label' => 'Data Castração', 'type'=>'date', 'empty' => ['year' => true,'month' => true, 'day' => true ]]) ?>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vacinas <?=$this->LinkAdd->get($this, $action, 'vacinaDialog')?>
                    </div>
                    <div class="card-body">
                        <i class="fa fa-circle fa-fw" style="color: <?=isset($animal->prontuario) ? $this->CorAviso->getNome($animal->prontuario->proximaVacina) : ''?>;"></i> 
                        Próxima:  <?=isset($animal->prontuario) ? $animal->prontuario->proximaVacina->format('d/m/Y') : ''?>
                        <ul class="list-group">
                            <?php if(isset($animal->prontuario->vacinas)){ foreach ($animal->prontuario->vacinas as $vacina):?>
                            <li class="list-group-item">
                                <?=$vacina->nome .'-'.$vacina->data_aplicacao?>
                                <?=$this->LinkDel->get($this, $action, 'deleteVacina', $vacina->id, $vacina->data_aplicacao, $animal->id_animal)?>
                            </li>
                            <?php endforeach;}?>
                        </ul>                        
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Seresto <?=$this->LinkAdd->get($this, $action, 'serestoDialog')?>
                    </div>
                    <div class="card-body"> 
                        <i class="fa fa-circle fa-fw" style="color: <?=isset($animal->prontuario) ? $this->CorAviso->getNome($animal->prontuario->proximoSeresto) : ''?>;"></i> 
                        Próxima: <?=isset($animal->prontuario) ? $animal->prontuario->proximoSeresto->format('d/m/Y') : ''?>
                        <ul class="list-group">
                            <?php if(isset($animal->prontuario->serestos)){ foreach ($animal->prontuario->serestos as $seresto):?>
                            <li class="list-group-item">
                                <?=$seresto->data_aplicacao?>
                                <?=$this->LinkDel->get($this, $action, 'deleteSeresto', $seresto->id, $seresto->data_aplicacao, $animal->id_animal)?>
                            </li>
                            <?php endforeach;}?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Vermífugo <?=$this->LinkAdd->get($this, $action, 'vermifugoDialog')?>
                    </div>
                    <div class="card-body">
                        <i class="fa fa-circle fa-fw" style="color: <?=isset($animal->prontuario) ? $this->CorAviso->getNome($animal->prontuario->proximoVermifugo) : ''?>;"></i> 
                        Próxima: <?=isset($animal->prontuario) ? $animal->prontuario->proximoVermifugo->format('d/m/Y') : ''?>
                        <ul class="list-group">
                            <?php if(isset($animal->prontuario->vermifugos)){ foreach ($animal->prontuario->vermifugos as $vermifugo):?>
                            <li class="list-group-item">
                                <?=$vermifugo->data_aplicacao?>
                                <?=$this->LinkDel->get($this, $action, 'deleteVermifugo', $vermifugo->id, $vermifugo->data_aplicacao, $animal->id_animal)?>
                            </li>
                            <?php endforeach;}?>
                        </ul>                       
                    </div>
                </div>
            </div>          

        </div>
    </div>
 </div>