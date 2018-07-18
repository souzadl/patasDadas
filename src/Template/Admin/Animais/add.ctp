<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Animais'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="animais form large-9 medium-8 columns content">
    <?= $this->Form->create($animai) ?>
    <fieldset>
        <legend><?= __('Add Animai') ?></legend>
        <?php
            echo $this->Form->control('data_cadastro', ['empty' => true]);
            echo $this->Form->control('data_alteracao', ['empty' => true]);
            echo $this->Form->control('tipo');
            echo $this->Form->control('nome');
            echo $this->Form->control('data_nascimento', ['empty' => true]);
            echo $this->Form->control('data_aparicao', ['empty' => true]);
            echo $this->Form->control('local_aparicao');
            echo $this->Form->control('sexo');
            echo $this->Form->control('porte');
            echo $this->Form->control('pelagem');
            echo $this->Form->control('condicao');
            echo $this->Form->control('data_condicao', ['empty' => true]);
            echo $this->Form->control('data_castracao', ['empty' => true]);
            echo $this->Form->control('data_vacinacao', ['empty' => true]);
            echo $this->Form->control('data_vermifugacao', ['empty' => true]);
            echo $this->Form->control('temperamento');
            echo $this->Form->control('observacao');
            echo $this->Form->control('observacao_privada');
            echo $this->Form->control('foto');
            echo $this->Form->control('tratamento');
            echo $this->Form->control('perfil_facebook');
            echo $this->Form->control('perfil_instagram');
            echo $this->Form->control('album_facebook');
            echo $this->Form->control('padrinho_racao');
            echo $this->Form->control('padrinho_castracao');
            echo $this->Form->control('padrinho_vacinas');
            echo $this->Form->control('padrinho_pulgas');
            echo $this->Form->control('check_castrado');
            echo $this->Form->control('check_vermifugado');
            echo $this->Form->control('check_vacinado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
