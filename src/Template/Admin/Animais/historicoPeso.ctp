<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Histórico Peso <a href="#" data-toggle="modal" data-target="#historicoPesoDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <table class="table" id="tableHistoricoPeso">
            <?php
            echo $this->Html->tableHeaders(['Data de aferição', 'Peso', '']);
            if(isset($animal->prontuario->historicospeso)){
                foreach($animal->prontuario->historicospeso as $historico){
                    echo $this->Html->tableCells([$historico->data_afericao, $historico->peso,                        
                        $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                            ['action' => 'deleteHistoricoPeso', $historico->id, $animal->id_animal], 
                            ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $historico->data_afericao)])
                    ]);    
                }
            }
            ?>
        </table>
    </div>
</div>
