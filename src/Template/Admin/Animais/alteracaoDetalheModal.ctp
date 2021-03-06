<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="modal fade" id="alteracaoDetalheDialog" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes Alteração de Saúde</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>           
            <div class="modal-body">
                <?php 
                echo $this->Form->create('', ['action'=>'addAlteracaoDetalhe']);
                echo $this->Form->control('alteracoes_id', ['type'=>'hidden', 'value'=>'', 'id'=>'codModal']);
                echo $this->Form->control('data', ['label'=>'Data', 'type'=>'date', 'required'=>'required']);
                echo $this->Form->control('obs', ['label'=>'Observação', 'type'=>'textarea', 'required'=>'required']);
                echo $this->Form->button(__('Submit'));
                echo $this->Form->end()
                ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
