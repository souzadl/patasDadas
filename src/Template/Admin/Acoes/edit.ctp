<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aco $aco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Acoes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="acoes form large-9 medium-8 columns content">
    <?= $this->Form->create($aco) ?>
    <fieldset>
        <legend><?= __('Edit Aco') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
