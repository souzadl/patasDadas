<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apadrinhamento $apadrinhamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apadrinhamento'), ['action' => 'edit', $apadrinhamento->id_apadrinhamento]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apadrinhamento'), ['action' => 'delete', $apadrinhamento->id_apadrinhamento], ['confirm' => __('Are you sure you want to delete # {0}?', $apadrinhamento->id_apadrinhamento)]) ?> </li>
        <li><?= $this->Html->link(__('List Apadrinhamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apadrinhamento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apadrinhamentos view large-9 medium-8 columns content">
    <h3><?= h($apadrinhamento->id_apadrinhamento) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Pagseguro') ?></th>
            <td><?= h($apadrinhamento->id_pagseguro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($apadrinhamento->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($apadrinhamento->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($apadrinhamento->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($apadrinhamento->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($apadrinhamento->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastEventDate') ?></th>
            <td><?= h($apadrinhamento->lastEventDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentMethod Type') ?></th>
            <td><?= h($apadrinhamento->paymentMethod_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentMethod Code') ?></th>
            <td><?= h($apadrinhamento->paymentMethod_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrossAmount') ?></th>
            <td><?= h($apadrinhamento->grossAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountAmount') ?></th>
            <td><?= h($apadrinhamento->discountAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FeeAmount') ?></th>
            <td><?= h($apadrinhamento->feeAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NetAmount') ?></th>
            <td><?= h($apadrinhamento->netAmount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EscrowEndDate') ?></th>
            <td><?= h($apadrinhamento->escrowEndDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('InstallmentCount') ?></th>
            <td><?= h($apadrinhamento->installmentCount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemCount') ?></th>
            <td><?= h($apadrinhamento->itemCount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Name') ?></th>
            <td><?= h($apadrinhamento->sender_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Email') ?></th>
            <td><?= h($apadrinhamento->sender_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Phone') ?></th>
            <td><?= h($apadrinhamento->sender_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Apadrinhamento') ?></th>
            <td><?= $this->Number->format($apadrinhamento->id_apadrinhamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Apadrinhamento Tipo') ?></th>
            <td><?= $this->Number->format($apadrinhamento->id_apadrinhamento_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Animal') ?></th>
            <td><?= $this->Number->format($apadrinhamento->id_animal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Padrinho') ?></th>
            <td><?= $this->Number->format($apadrinhamento->id_padrinho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($apadrinhamento->data_alteracao) ?></td>
        </tr>
    </table>
</div>
