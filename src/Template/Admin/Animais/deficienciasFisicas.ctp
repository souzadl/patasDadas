<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Deficiências Físicas <a href="#" data-toggle="modal" data-target="#deficienciaFisicaDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <ul id="listaDeficienciasFisicas">
        <?php if(isset($prontuario->deficienciasfisicas)){ foreach($prontuario->deficienciasfisicas as $deficiencia): ?>                        
            <li><?=$deficiencia->descricao?> <a href="#" class="del" id="apagarHistoricoPeso/<?= $historico->id ?>"><i class="fa fa-trash"></i></a></li>
        <?php endforeach;}?>                             
        </ul>  
    </div>
</div>
