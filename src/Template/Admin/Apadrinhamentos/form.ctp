<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apadrinhamento $apadrinhamento
 */
?>
<div class="apadrinhamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($apadrinhamento) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Apadrinhamento'); ?></legend>
        <?php
            echo $this->Form->control('lastEventDate', ['label' => 'Última atualização de pagamentos']);
            echo $this->Form->control('id_padrinho', ['label' => 'Padrinho', 'options' => $padrinhos]);
            echo $this->Form->control('id_apadrinhamento_tipo', ['label' => 'Tipo Apadrinhamento', 'options' => $apadrinhamentosTipos]);
            echo $this->Form->control('grossAmount', ['label' => 'Valor']);
            echo $this->Form->control('apadrinhamentostipos.periodicidade');
            echo $this->Form->control('status', ['label' => 'Status do pagamento']);
//echo $this->Form->control('id_animal', ['label' => 'Animal', 'options' => $animais]);
            
            //echo $this->Form->control('data_alteracao', ['empty' => true, 'readonly' => true]);
            //echo $this->Form->control('id_pagseguro', ['readonly' => true]);
            //echo $this->Form->control('date');
            //echo $this->Form->control('code');
            //echo $this->Form->control('reference');
           // echo $this->Form->control('type');
            //
            //
            //echo $this->Form->control('paymentMethod_type');
            //echo $this->Form->control('paymentMethod_code');
            
            //echo $this->Form->control('discountAmount');
            //echo $this->Form->control('feeAmount');
            //echo $this->Form->control('netAmount');
            //echo $this->Form->control('escrowEndDate');
            //echo $this->Form->control('installmentCount');
            //echo $this->Form->control('itemCount');
            //echo $this->Form->control('sender_name');
            //echo $this->Form->control('sender_email');
            //echo $this->Form->control('sender_phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
