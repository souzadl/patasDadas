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
            if(isset($prontuario->historicospeso)){
                foreach($prontuario->historicospeso as $historico){
                    echo $this->Html->tableCells([$historico->data_afericao, $historico->peso, '<a href="#" class="del" id="apagarHistoricoPeso/<?= $historico->id ?>"><i class="fa fa-trash"></i></a>']);    
                }
            }
            ?>
        </table>
    </div>
</div>
