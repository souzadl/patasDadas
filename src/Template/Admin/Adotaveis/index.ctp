<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<h4><?= __('Adotáveis') ?></h4>
<?= $this->element('acao_add') ?>
<?= $this->Form->create(NULL, [
    'url' => ['controller' => 'Adotaveis', 'action' => 'index']
]) ?> 
<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <?= $this->Paginator->sort('nome') ?>
                <?= $this->Form->input('nome', [
                    'label'=>false, 
                    'value'=>$filtro['nome']?? '',
                    'style'=>'width: 100px;'
                        
                ]) ?>
            </th>
            <th scope="col"><?= $this->Paginator->sort('tipos_adotavel_id', ['label' => 'Tipo']) ?></th>                
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
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
<?= $this->element('paginacao') ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>