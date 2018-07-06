<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<h4><?= __('Adotáveis') ?></h4>
<?= $this->element('acao_add') ?>
<?= $this->Form->create(NULL, ['id'=>'formFilter']) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <?= $this->Form->input('filter_nome', [
                    'type' => 'text', 
                    'label'=>$this->Paginator->sort('nome'), 
                    'escape'=>false
                    ]) ?>
            </th>
            <th scope="col">
                <?= $this->Form->input('filter_tipos_adotaveis_id', [
                    'type' => 'select', 
                    'label'=>$this->Paginator->sort('tipos_adotaveis_id', ['label' => 'Tipo']), 
                    'escape'=>false,
                    'options'=>$tiposAdotaveis,
                    'empty'=>'Selecione'
                    ]) ?>
            </th>                
            <th scope="col">
                <?= $this->Form->input('filter_ativo', [
                    'type' => 'select', 
                    'label'=>$this->Paginator->sort('active'), 
                    'escape'=>false,
                    'options'=>['1'=>'Sim','0'=>'Não'],
                    'empty'=>'Selecione'
                    ]) 
                ?>
            </th>
            <th scope="col" class="actions">
                <?= __('Actions') ?>
                <?= $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-search', 'alt'=>__('Filtrar')]), '#', [
                    'escape'=>false,
                    'id'=>'submitFilter',
                    'style'=>'float: right;'
                    ]) ?>
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