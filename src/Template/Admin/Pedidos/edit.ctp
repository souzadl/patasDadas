<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedido->id_pedido],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id_pedido)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Edit Pedido') ?></legend>
        <?php
            echo $this->Form->control('id_pagseguro');
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('data_pedido', ['empty' => true]);
            echo $this->Form->control('valor_total');
            echo $this->Form->control('estoque_atualizado');
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
