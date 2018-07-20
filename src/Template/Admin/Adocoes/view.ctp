<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adoco $adoco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adoco'), ['action' => 'edit', $adoco->id_adocao]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adoco'), ['action' => 'delete', $adoco->id_adocao], ['confirm' => __('Are you sure you want to delete # {0}?', $adoco->id_adocao)]) ?> </li>
        <li><?= $this->Html->link(__('List Adocoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoco'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adocoes view large-9 medium-8 columns content">
    <h3><?= h($adoco->id_adocao) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($adoco->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Agent') ?></th>
            <td><?= h($adoco->user_agent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Origem Url') ?></th>
            <td><?= h($adoco->origem_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Origem Campanha') ?></th>
            <td><?= h($adoco->origem_campanha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($adoco->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($adoco->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($adoco->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Adocao') ?></th>
            <td><?= $this->Number->format($adoco->id_adocao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Animal') ?></th>
            <td><?= $this->Number->format($adoco->id_animal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($adoco->data_alteracao) ?></td>
        </tr>
    </table>
</div>
