<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Doenças Crônicas <a href="#" data-toggle="modal" data-target="#doencaCronicaDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <ul id="listaDoencasCronicas">
            <?php if(isset($prontuario->doencascronicas)){ foreach($prontuario->doencascronicas as $doenca): ?>                        
            <li><?=$doenca->descricao?> <a href="#" class="del" id="deleteDoencaCronica/<?= $doenca->id ?>"><i class="fa fa-trash"></i></a></li>
            <?php endforeach;}?>
        </ul>
    </div>
</div>
