<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
use Cake\Core\Configure;
?>
<div class="eventos form large-9 medium-8 columns content">
    <?= $this->Form->create($evento) ?>
    <fieldset <?= (isset($action) and $action === $this::VIEW) ? 'disabled' : ''; ?> >
        <legend><?= $this->RotuloAcao($action, 'Evento'); ?></legend>
        <?php
            echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('local');            
            echo $this->Form->control('horario');
            echo $this->Form->control('evento');
            echo $this->Html->image(Configure::read('App.imageEventoUrl') . $evento->imagem, ['style'=>'width:100px']);
            echo $this->Form->control('imagem', ['label' => '', 'type' => 'file']);            
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
