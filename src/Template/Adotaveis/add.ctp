<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $adotavei
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adotaveis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos Adotaveis'), ['controller' => 'TiposAdotaveis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipos Adotavei'), ['controller' => 'TiposAdotaveis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Padrinhos'), ['controller' => 'Padrinhos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Padrinho'), ['controller' => 'Padrinhos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fotos'), ['controller' => 'Fotos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Foto'), ['controller' => 'Fotos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adotaveis form large-9 medium-8 columns content">
    <?= $this->Form->create($adotavei) ?>
    <fieldset>
        <legend><?= __('Add Adotavei') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('porte');
            echo $this->Form->control('sexo');
            echo $this->Form->control('data_nascimento');
            echo $this->Form->control('vacinado');
            echo $this->Form->control('vermifugado');
            echo $this->Form->control('castrado');
            echo $this->Form->control('temperamento');
            echo $this->Form->control('descricao_site');
            echo $this->Form->control('historico_medico');
            echo $this->Form->control('url_facebook');
            echo $this->Form->control('url_intagram');
            echo $this->Form->control('active');
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('tipos_adotaveis_id', ['options' => $tiposAdotaveis]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
