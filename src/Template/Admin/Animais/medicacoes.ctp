<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Medicações <a href="#" data-toggle="modal" data-target="#medicacaoDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <table class="table" id="tableMedicacoes">
        <?php
        echo $this->Html->tableHeaders(['Medicação', 'Uso', 'Dosagem', 'Frequência', 'Contínuo', 'Início', 'Término', '']);
        if(isset($prontuario->deficienciasfisicas)){
            foreach($prontuario->medicacoes as $medicacao){
                echo $this->Html->tableCells([$medicacao->descricao, 
                    $medicacao->uso, $medicacao->dosagem, $medicacao->frequencia, 
                    ($medicacao->continuo == 1 ? 'Sim' : 'Não'), 
                    $medicacao->inicio, $medicacao->termino,
                    '<a href="#" class="del" id="deleteMedicacao/'.$medicacao->id.'"><i class="fa fa-trash"></i></a>']);    
            }
        }
        ?>
        </table>  
    </div>
</div>
