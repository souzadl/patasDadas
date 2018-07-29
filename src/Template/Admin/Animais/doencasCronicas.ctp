<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Doenças Crônicas <?=$this->LinkAdd->get($this, $action, 'doencaCronicaDialog')?>        
    </div>
    <div class="card-body">
        <?php
        if(isset($animal->prontuario->doencascronicas)){ 
            foreach($animal->prontuario->doencascronicas as $index=>$doenca){
                echo $doenca->descricao . ' '.
                    $this->LinkDel->get($this, $action, 'deleteDoencaCronica', $doenca->id, $doenca->descricao, $animal->id_animal);
                echo ($index < count($animal->prontuario->doencascronicas)-1) ? ' | ' : '';
            }
        }
        ?>
    </div>
</div>
