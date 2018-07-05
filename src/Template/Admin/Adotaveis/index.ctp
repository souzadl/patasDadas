<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<h4><?= __('Adotáveis') ?></h4>
<?= $this->element('acao_add') ?>
<?= $this->Form->create() ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <?= $this->Paginator->sort('nome') ?>
                <?= $this->Form->input('filter_nome', ['type' => 'text', 'label'=>'', 'style'=>'width: 80%;']) ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('tipos_adotavel_id', ['label' => 'Tipo']) ?>
                <?= $this->Form->input('filter_tipo', ['type' => 'select', 'label'=>'', 'style'=>'width: 80%;']) ?>
            </th>                
            <th scope="col">
                <?= $this->Paginator->sort('active') ?>
                <?= $this->Form->input('filter_active', ['type' => 'select', 'label'=>'', 'style'=>'width: 80%;']) ?>
            </th>
            <th scope="col" class="actions">
                <?= __('Actions') ?>
                <?= $this->Form->button('Filtrar', ['type' => 'submit']) ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($adotaveis as $adotavel): ?>
        <tr>
            <td><?= h($adotavel->nome) ?></td>
            <td><?= $adotavel->has('tipos_adotavei') ? $this->Html->link($adotavel->tipos_adotavei->nome, ['controller' => 'TiposAdotaveis', 'action' => 'view', $adotavel->tipos_adotavei->id]) : '' ?></td>
            <td><?= $this->SimOuNao($adotavel->active); ?></td> 
            <td class="actions"> <?= $this->element('acoes_lista', ['id' => $adotavel->id, 'descDel' => $adotavel->nome]) ?> </td>    
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->Form->end() ?>
<?= $this->element('paginacao') ?>