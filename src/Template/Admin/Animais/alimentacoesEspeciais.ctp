<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Alimentações Especiais <?=$this->LinkAdd->get($this, $action, 'alimentacaoEspecialDialog')?>  
    </div>
    <div class="card-body">
        <?php 
        if(isset($animal->prontuario->alimentacoesespeciais)){ 
            foreach($animal->prontuario->alimentacoesespeciais as $index=>$alimentacao){
                echo $alimentacao->descricao.' '.
                    $this->LinkDel->get($this, $action, 'deleteAlimentacaoEspecial', $alimentacao->id, $alimentacao->descricao, $animal->id_animal);
                echo ($index < count($animal->prontuario->alimentacoesespeciais)-1) ? ' | ' : '';
            }            
        }
        ?>    
    </div>
</div>
