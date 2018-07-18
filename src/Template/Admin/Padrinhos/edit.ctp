<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Padrinho $padrinho
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $padrinho->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $padrinho->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Padrinhos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adotaveis'), ['controller' => 'Adotaveis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adotavei'), ['controller' => 'Adotaveis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos Padrinhos'), ['controller' => 'TiposPadrinhos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipos Padrinho'), ['controller' => 'TiposPadrinhos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padrinhos form large-9 medium-8 columns content">
    <?= $this->Form->create($padrinho) ?>
    <fieldset>
        <legend><?= __('Edit Padrinho') ?></legend>
        <?php
            echo $this->Form->control('id_padrinho');
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
            echo $this->Form->control('cpf');
            echo $this->Form->control('rg');
            echo $this->Form->control('endereco');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
            echo $this->Form->control('cep');
            echo $this->Form->control('facebook');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
