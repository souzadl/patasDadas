<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id_pedido]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id_pedido], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id_pedido)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id_pedido) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Pagseguro') ?></th>
            <td><?= h($pedido->id_pagseguro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estoque Atualizado') ?></th>
            <td><?= h($pedido->estoque_atualizado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pedido->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($pedido->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($pedido->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($pedido->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($pedido->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastEventDate') ?></th>
            <td><?= h($pedido->lastEventDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentMethod Type') ?></th>
            <td><?= h($pedido->paymentMethod_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentMethod Code') ?></th>
            <td><?= h($pedido->paymentMethod_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrossAmount') ?></th>
            <td><?= h($pedido->grossAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountAmount') ?></th>
            <td><?= h($pedido->discountAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FeeAmount') ?></th>
            <td><?= h($pedido->feeAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NetAmount') ?></th>
            <td><?= h($pedido->netAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EscrowEndDate') ?></th>
            <td><?= h($pedido->escrowEndDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('InstallmentCount') ?></th>
            <td><?= h($pedido->installmentCount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemCount') ?></th>
            <td><?= h($pedido->itemCount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Name') ?></th>
            <td><?= h($pedido->sender_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Email') ?></th>
            <td><?= h($pedido->sender_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Phone') ?></th>
            <td><?= h($pedido->sender_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pedido') ?></th>
            <td><?= $this->Number->format($pedido->id_pedido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($pedido->valor_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($pedido->data_alteracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Pedido') ?></th>
            <td><?= h($pedido->data_pedido) ?></td>
        </tr>
    </table>
</div>
