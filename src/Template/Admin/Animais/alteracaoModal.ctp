<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="modal fade" id="alteracaoDialog" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alteração de Saúde</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>           
            <div class="modal-body">
                <?php 
                echo $this->Form->create('', ['action'=>'addAlteracao']);
                echo $this->Form->control('id_animal', ['type'=>'hidden', 'value'=>$animal->id_animal]);
                echo $this->Form->control('prontuario_id', ['type'=>'hidden', 'value'=>$animal->prontuario->id ?? 0]);
                echo $this->Form->control('descricao', ['label'=>'Descrição', 'required'=>'required']);
                echo $this->Form->control('status', ['label'=>'Status', 'type'=>'select', 'options'=>['P'=>'Pendente','R'=>'Resolvido'], 'required'=>'required']);
                echo $this->Form->control('alteracoes_detalhes[0].data', ['label'=>'Data', 'type'=>'date', 'required'=>'required']);
                echo $this->Form->control('alteracoes_detalhes[0].obs', ['label'=>'Observação', 'type'=>'textarea', 'required'=>'required']);
                echo $this->Form->button(__('Submit'));
                echo $this->Form->end()
                ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
