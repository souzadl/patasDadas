<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Deficiências Físicas <?=$this->LinkAdd->get($this, $action, 'deficienciaFisicaDialog')?>
    </div>
    <div class="card-body">
        <?php 
        if(isset($animal->prontuario->deficienciasfisicas)){ 
            foreach($animal->prontuario->deficienciasfisicas as $index => $deficiencia){
                echo $deficiencia->descricao.' '.
                    $this->LinkDel->get($this, $action, 'deleteDeficienciaFisica', $deficiencia->id, $deficiencia->descricao, $animal->id_animal);
                echo ($index < count($animal->prontuario->deficienciasfisicas)-1) ? ' | ' : '';
            }
        }
        ?>        
    </div>
</div>
