<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Histórico Peso <?=$this->LinkAdd->get($this, $action, 'historicoPesoDialog')?>        
    </div>
    <div class="card-body">
        <table class="table" id="tableHistoricoPeso">
            <?php
            echo $this->Html->tableHeaders(['Data de aferição', 'Peso', '']);
            if(isset($animal->prontuario->historicospeso)){
                foreach($animal->prontuario->historicospeso as $historico){
                    echo $this->Html->tableCells([
                        $historico->data_afericao, 
                        $historico->peso,
                        $this->LinkDel->get($this, $action, 'deleteHistoricoPeso', $historico->id, $historico->data_afericao, $animal->id_animal)                        
                    ]);    
                }
            }
            ?>
        </table>
    </div>
</div>
