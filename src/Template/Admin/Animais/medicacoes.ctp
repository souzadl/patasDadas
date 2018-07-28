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
        if(isset($animal->prontuarios['medicacoes'])){
            foreach($animal->prontuarios['medicacoes'] as $medicacao){
                echo $this->Html->tableCells([$medicacao->descricao, 
                    $medicacao->uso, $medicacao->dosagem, $medicacao->frequencia, 
                    ($medicacao->continuo == 1 ? 'Sim' : 'Não'), 
                    $medicacao->inicio, $medicacao->termino,
                    $this->Form->postLink($this->Html->tag('i','',['class'=>'fas fa-trash-alt']),
                        ['action' => 'deleteMedicacao', $medicacao->id, $animal->id_animal], 
                        ['escape'=>false, 'confirm' => __('Confime a exclusão de {0}?', $medicacao->descricao)])]);    
            }
        }
        ?>
        </table>  
    </div>
</div>
