<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adotavei'), ['action' => 'add']) ?></li>
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
<div class="adotaveis index large-9 medium-8 columns content">
    <h3><?= __('Adotaveis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('porte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vacinado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vermifugado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castrado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_facebook') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_intagram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipos_adotaveis_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adotaveis as $adotavei): ?>
            <tr>
                <td><?= $this->Number->format($adotavei->id) ?></td>
                <td><?= h($adotavei->nome) ?></td>
                <td><?= h($adotavei->porte) ?></td>
                <td><?= h($adotavei->sexo) ?></td>
                <td><?= h($adotavei->data_nascimento) ?></td>
                <td><?= h($adotavei->vacinado) ?></td>
                <td><?= h($adotavei->vermifugado) ?></td>
                <td><?= h($adotavei->castrado) ?></td>
                <td><?= h($adotavei->temperamento) ?></td>
                <td><?= h($adotavei->url_facebook) ?></td>
                <td><?= h($adotavei->url_intagram) ?></td>
                <td><?= h($adotavei->created) ?></td>
                <td><?= h($adotavei->modified) ?></td>
                <td><?= h($adotavei->active) ?></td>
                <td><?= $adotavei->has('user') ? $this->Html->link($adotavei->user->name, ['controller' => 'Users', 'action' => 'view', $adotavei->user->id]) : '' ?></td>
                <td><?= $adotavei->has('tipos_adotavei') ? $this->Html->link($adotavei->tipos_adotavei->nome, ['controller' => 'TiposAdotaveis', 'action' => 'view', $adotavei->tipos_adotavei->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adotavei->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adotavei->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adotavei->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adotavei->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
