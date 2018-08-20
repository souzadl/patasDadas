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
            echo $this->Form->control('status_desc', ['label' => 'Status do pagamento']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === $this::VIEW) ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
