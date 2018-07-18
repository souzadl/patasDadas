<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Padrinho $padrinho
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Padrinho'), ['action' => 'edit', $padrinho->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Padrinho'), ['action' => 'delete', $padrinho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padrinho->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Padrinhos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Padrinho'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adotaveis'), ['controller' => 'Adotaveis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adotavei'), ['controller' => 'Adotaveis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipos Padrinhos'), ['controller' => 'TiposPadrinhos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipos Padrinho'), ['controller' => 'TiposPadrinhos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padrinhos view large-9 medium-8 columns content">
    <h3><?= h($padrinho->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($padrinho->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($padrinho->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($padrinho->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($padrinho->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rg') ?></th>
            <td><?= h($padrinho->rg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($padrinho->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($padrinho->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($padrinho->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($padrinho->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facebook') ?></th>
            <td><?= h($padrinho->facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Padrinho') ?></th>
            <td><?= $this->Number->format($padrinho->id_padrinho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($padrinho->data_alteracao) ?></td>
        </tr>
    </table>
</div>
