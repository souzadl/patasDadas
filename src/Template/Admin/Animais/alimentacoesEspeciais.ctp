<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="card">
    <div class="card-header">
        Alimentações Especiais <a href="#" data-toggle="modal" data-target="#alimentacaoEspecialDialog"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
                        <ul id="listaAlimentacoesEspeciais">
                        <?php if(isset($prontuario->alimentacoesespeciais)){ foreach($prontuario->alimentacoesespeciais as $alimentacao): ?>                        
                            <li><?=$alimentacao->descricao?> <a href="#" class="del" id="apagarHistoricoPeso/<?= $historico->id ?>"><i class="fa fa-trash"></i></a></li>
                        <?php endforeach;}?>                            
                        </ul>
    </div>
</div>
