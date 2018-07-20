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
        echo $this->Html->tableHeaders(['Medicação', 'Uso', 'Dosagem', 'Frequência', 'Contínuo', 'Início', 'Término']);
        if(isset($prontuario->deficienciasfisicas)){
            foreach($prontuario->medicacoes as $medicacao){
                echo $this->Html->tableCells([$medicacao->descricao, 
                    $medicacao->uso, $medicacao->dosagem, $medicacao->frequencia, 
                    $medicacao->continuo, $medicacao->inicio, $medicacao->termino]);    
            }
        }
        ?>
        </table>  
    </div>
</div>
