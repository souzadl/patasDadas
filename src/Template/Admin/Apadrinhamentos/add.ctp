<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apadrinhamento $apadrinhamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Apadrinhamentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="apadrinhamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($apadrinhamento) ?>
    <fieldset>
        <legend><?= __('Add Apadrinhamento') ?></legend>
        <?php
            echo $this->Form->control('id_apadrinhamento_tipo');
            echo $this->Form->control('id_animal');
            echo $this->Form->control('id_padrinho');
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('id_pagseguro');
            echo $this->Form->control('date');
            echo $this->Form->control('code');
            echo $this->Form->control('reference');
            echo $this->Form->control('type');
            echo $this->Form->control('status');
            echo $this->Form->control('lastEventDate');
            echo $this->Form->control('paymentMethod_type');
            echo $this->Form->control('paymentMethod_code');
            echo $this->Form->control('grossAmount');
            echo $this->Form->control('discountAmount');
            echo $this->Form->control('feeAmount');
            echo $this->Form->control('netAmount');
            echo $this->Form->control('escrowEndDate');
            echo $this->Form->control('installmentCount');
            echo $this->Form->control('itemCount');
            echo $this->Form->control('sender_name');
            echo $this->Form->control('sender_email');
            echo $this->Form->control('sender_phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
