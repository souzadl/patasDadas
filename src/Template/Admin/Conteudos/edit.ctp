<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conteudo $conteudo
 */
?>
<div class="conteudos form large-9 medium-8 columns content">
    <legend><?= __('Conteúdo') ?></legend>
    <?= $this->Form->create($conteudo) ?>
    <fieldset>
        <?php
            echo $this->Form->control('facebook');
            echo $this->Form->control('twitter');
            echo $this->Form->control('instagram');
            echo $this->Form->control('imagem');
            echo $this->Form->control('arquivo');
            echo $this->Form->control('email');
            echo $this->Form->control('missao');
            echo $this->Form->control('historia');       
 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
