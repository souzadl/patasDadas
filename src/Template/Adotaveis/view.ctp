<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $adotavei
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adotavei'), ['action' => 'edit', $adotavei->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adotavei'), ['action' => 'delete', $adotavei->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adotavei->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adotaveis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adotavei'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipos Adotaveis'), ['controller' => 'TiposAdotaveis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipos Adotavei'), ['controller' => 'TiposAdotaveis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Padrinhos'), ['controller' => 'Padrinhos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Padrinho'), ['controller' => 'Padrinhos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fotos'), ['controller' => 'Fotos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Foto'), ['controller' => 'Fotos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adotaveis view large-9 medium-8 columns content">
    <h3><?= h($adotavei->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($adotavei->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Porte') ?></th>
            <td><?= h($adotavei->porte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($adotavei->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temperamento') ?></th>
            <td><?= h($adotavei->temperamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url Facebook') ?></th>
            <td><?= h($adotavei->url_facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url Intagram') ?></th>
            <td><?= h($adotavei->url_intagram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $adotavei->has('user') ? $this->Html->link($adotavei->user->name, ['controller' => 'Users', 'action' => 'view', $adotavei->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipos Adotavei') ?></th>
            <td><?= $adotavei->has('tipos_adotavei') ? $this->Html->link($adotavei->tipos_adotavei->nome, ['controller' => 'TiposAdotaveis', 'action' => 'view', $adotavei->tipos_adotavei->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adotavei->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($adotavei->data_nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adotavei->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adotavei->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vacinado') ?></th>
            <td><?= $adotavei->vacinado ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vermifugado') ?></th>
            <td><?= $adotavei->vermifugado ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Castrado') ?></th>
            <td><?= $adotavei->castrado ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $adotavei->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao Site') ?></h4>
        <?= $this->Text->autoParagraph(h($adotavei->descricao_site)); ?>
    </div>
    <div class="row">
        <h4><?= __('Historico Medico') ?></h4>
        <?= $this->Text->autoParagraph(h($adotavei->historico_medico)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Padrinhos') ?></h4>
        <?php if (!empty($adotavei->padrinhos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoas Id') ?></th>
                <th scope="col"><?= __('Adotaveis Id') ?></th>
                <th scope="col"><?= __('Tipos Padrinhos Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adotavei->padrinhos as $padrinhos): ?>
            <tr>
                <td><?= h($padrinhos->id) ?></td>
                <td><?= h($padrinhos->pessoas_id) ?></td>
                <td><?= h($padrinhos->adotaveis_id) ?></td>
                <td><?= h($padrinhos->tipos_padrinhos_id) ?></td>
                <td><?= h($padrinhos->created) ?></td>
                <td><?= h($padrinhos->modified) ?></td>
                <td><?= h($padrinhos->active) ?></td>
                <td><?= h($padrinhos->users_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Padrinhos', 'action' => 'view', $padrinhos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Padrinhos', 'action' => 'edit', $padrinhos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Padrinhos', 'action' => 'delete', $padrinhos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padrinhos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fotos') ?></h4>
        <?php if (!empty($adotavei->fotos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Adotaveis Id') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adotavei->fotos as $fotos): ?>
            <tr>
                <td><?= h($fotos->id) ?></td>
                <td><?= h($fotos->nome) ?></td>
                <td><?= h($fotos->active) ?></td>
                <td><?= h($fotos->created) ?></td>
                <td><?= h($fotos->modified) ?></td>
                <td><?= h($fotos->adotaveis_id) ?></td>
                <td><?= h($fotos->users_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fotos', 'action' => 'view', $fotos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fotos', 'action' => 'edit', $fotos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fotos', 'action' => 'delete', $fotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
