<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Medicações <?=$this->LinkAdd->get($this, $action, 'medicacaoDialog')?>
    </div>
    <div class="card-body">
        <table class="table" id="tableMedicacoes">
        <?php
        echo $this->Html->tableHeaders(['Medicação', 'Uso', 'Dosagem', 'Frequência', 'Contínuo', 'Início', 'Término', '']);
        if(isset($animal->prontuario->medicacoes)){
            foreach($animal->prontuario->medicacoes as $medicacao){
                echo $this->Html->tableCells([
                    $medicacao->descricao, 
                    $medicacao->uso, 
                    $medicacao->dosagem, 
                    $medicacao->frequencia, 
                    ($medicacao->continuo == 1 ? 'Sim' : 'Não'), 
                    $medicacao->inicio, 
                    $medicacao->termino,
                    $this->LinkDel->get($this, $action, 'deleteMedicacao', $medicacao->id, $medicacao->descricao, $animal->id_animal)
                ]);
            }
        }
        ?>
        </table>  
    </div>
</div>
