<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adoco $adoco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adocoes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adocoes form large-9 medium-8 columns content">
    <?= $this->Form->create($adoco) ?>
    <fieldset>
        <legend><?= __('Add Adoco') ?></legend>
        <?php
            echo $this->Form->control('id_animal');
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('ip');
            echo $this->Form->control('user_agent');
            echo $this->Form->control('origem_url');
            echo $this->Form->control('origem_campanha');
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
