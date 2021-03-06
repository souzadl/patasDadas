<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>

<div id="accordion">
    <?php if(isset($animal->prontuario->alteracoes)){ foreach ($animal->prontuario->alteracoes as $alteracao):?>        
    <div class="card">
        <div class="card-header" id="heading<?=$alteracao->id?>">
            <h5 class="mb-0">
                <i class="fa fa-circle fa-fw" style="color: <?= ($alteracao->status == 'P') ? 'yellow' : 'green'?>;"></i>
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$alteracao->id?>" aria-expanded="false" aria-controls="collapse<?=$alteracao->id?>">
                    <?=substr($alteracao->descricao, 0, 70)?>
                </button>
                <?=$this->LinkDel->get($this, $action, 'deleteAlteracao', $alteracao->id, $alteracao->descricao, $animal->id_animal)?>
            </h5>
        </div>

        <div id="collapse<?=$alteracao->id?>" class="collapse" aria-labelledby="heading<?=$alteracao->id?>" data-parent="#accordion">
            <div class="card-body">
                <?=$this->Form->Control('status_alteracao',['data-id'=>$alteracao->id,'label'=>'Status','type'=>'select','options'=>['R'=>'Resolvido','P'=>'Pendente'],'value'=>$alteracao->status])?>
                <a href="#" data-toggle="modal" data-id="<?=$alteracao->id?>" data-target="#alteracaoDetalheDialog"><i class="fa fa-plus-circle"></i></a>
                <table class="table">
                    <?php
                    echo $this->Html->tableHeaders(['Data', 'Obs']);
                    if(isset($alteracao->alteracoes_detalhes)){  
                        foreach($alteracao->alteracoes_detalhes as $detalhe){
                            echo $this->Html->tableCells([$detalhe->data, $detalhe->obs]);   
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach;}?>
</div>
 
