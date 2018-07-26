<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>

<div id="accordion">
    <?php if(isset($prontuario->mudancas)){ foreach ($prontuario->mudancas as $alteracoes):?>        
    <div class="card">
        <div class="card-header" id="heading<?=$alteracoes->id?>">
            <h5 class="mb-0">
                <i class="fa fa-circle fa-fw" style="color: <?= ($alteracoes->status == 'P') ? 'yellow' : 'green'?>;"></i>
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$alteracoes->id?>" aria-expanded="false" aria-controls="collapse<?=$alteracoes->id?>">
                    <?=substr($alteracoes->descricao, 0, 70)?>
                </button>
                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteAlteracao', $alteracoes->id, $prontuario->id_animal], 
                    ['escape'=>false, 'style' => 'float: right;margin-top: 10px;'],
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $alteracoes->descricao)])?>
            </h5>
        </div>

        <div id="collapse<?=$alteracoes->id?>" class="collapse" aria-labelledby="heading<?=$alteracoes->id?>" data-parent="#accordion">
            <div class="card-body">
                <?=$this->Form->Control('status_alteracao',['label'=>'Status','type'=>'select','options'=>['R'=>'Resolvido','P'=>'Pendente'],'value'=>$alteracoes->status])?>
                <a href="#" data-toggle="modal" data-target="#detalhesDialog"><i class="fa fa-plus-circle"></i></a>
                <?php if(isset($alteracoes->detalhes)){  foreach($alteracoes->detalhes as $detalhe):?>
                <div class="row">
                    <div class="col">
                        <?=$this->Form->Control('data',['value'=>$detalhe->data,'type'=>'date'])?>
                    </div>
                    <div class="col">
                        <?=$this->Form->Control('obs',['value'=>$detalhe->obs])?>
                    </div>
                </div>           
                
                <?php endforeach;}?>
            </div>
        </div>
    </div>
    <?php endforeach;}?>
</div>
 
