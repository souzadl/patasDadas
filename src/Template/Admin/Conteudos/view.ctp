<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conteudo $conteudo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conteudo'), ['action' => 'edit', $conteudo->id_conteudo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conteudo'), ['action' => 'delete', $conteudo->id_conteudo], ['confirm' => __('Are you sure you want to delete # {0}?', $conteudo->id_conteudo)]) ?> </li>
        <li><?= $this->Html->link(__('List Conteudos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conteudo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conteudos view large-9 medium-8 columns content">
    <h3><?= h($conteudo->id_conteudo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Arquivo') ?></th>
            <td><?= h($conteudo->arquivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($conteudo->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($conteudo->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facebook') ?></th>
            <td><?= h($conteudo->facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Twitter') ?></th>
            <td><?= h($conteudo->twitter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Instagram') ?></th>
            <td><?= h($conteudo->instagram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Conteudo') ?></th>
            <td><?= $this->Number->format($conteudo->id_conteudo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($conteudo->data_alteracao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Missao') ?></h4>
        <?= $this->Text->autoParagraph(h($conteudo->missao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Historia') ?></h4>
        <?= $this->Text->autoParagraph(h($conteudo->historia)); ?>
    </div>
</div>
