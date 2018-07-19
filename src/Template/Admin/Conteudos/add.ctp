<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conteudo $conteudo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Conteudos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="conteudos form large-9 medium-8 columns content">
    <?= $this->Form->create($conteudo) ?>
    <fieldset>
        <legend><?= __('Add Conteudo') ?></legend>
        <?php
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('missao');
            echo $this->Form->control('historia');
            echo $this->Form->control('arquivo');
            echo $this->Form->control('email');
            echo $this->Form->control('imagem');
            echo $this->Form->control('facebook');
            echo $this->Form->control('twitter');
            echo $this->Form->control('instagram');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
