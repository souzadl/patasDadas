<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="modal fade" tabindex="-1" role="dialog" id="historicoPesoDialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Histórico Peso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>           
            <div class="modal-body">
                <?php 
                echo $this->Form->create('', ['action'=>'addHistoricoPeso']);
                echo $this->Form->control('id_animal', ['type'=>'hidden', 'value'=>$animai->id_animal]);
                echo $this->Form->control('prontuario_id', ['type'=>'hidden', 'value'=>$prontuario->id ?? 0]);
                echo $this->Form->control('data_afericao', ['label'=>'Data de Aferição', 'type'=>'date', 'required'=>'required']);
                echo $this->Form->control('peso', ['label'=>'Peso', 'required'=>'required']);
                echo $this->Form->button(__('Submit'));
                echo $this->Form->end()
                ?>
            </div>
        </div>
    </div>
</div>