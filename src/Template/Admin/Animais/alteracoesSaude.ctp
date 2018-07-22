<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>

<div id="accordion">
    <?php if(isset($prontuario->alteracoessaudes)){ foreach ($prontuario->alteracoessaudes as $alteracoes):?>        
    <div class="card">
        <div class="card-header" id="heading<?=$alteracoes->id?>">
            <h5 class="mb-0">
                <i class="fa fa-circle fa-fw" style="color: <?= ($alteracoes->status == 'P') ? 'yellow' : 'green'?>;"></i>
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$alteracoes->id?>" aria-expanded="false" aria-controls="collapse<?=$alteracoes->id?>">
                  <?=substr($alteracoes->descricao, 0, 10).'...'?>
                </button>
                <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                    ['action' => 'deleteAlteracao', $alteracoes->id, $prontuario->id_animal], 
                    ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $alteracoes->descricao)])?>
            </h5>
        </div>

        <div id="collapse<?=$alteracoes->id?>" class="collapse" aria-labelledby="heading<?=$alteracoes->id?>" data-parent="#accordion">
            <div class="card-body">
                teste
            </div>
        </div>
    </div>
    <?php endforeach;}?>
</div>
 
