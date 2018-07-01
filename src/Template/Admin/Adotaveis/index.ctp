<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<h4><?= __('Adotáveis') ?></h4>
<?= $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-plus-square'])/*.__('New')*/, ['action' => 'add'], ['escape'=>false]) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('tipos_adotavel_id', ['label' => 'Tipo']) ?></th>                
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($adotaveis as $adotavel): ?>
        <tr>
            <td><?= $this->Number->format($adotavel->id) ?></td>
            <td><?= h($adotavel->nome) ?></td>
            <td><?= $adotavel->has('tipos_adotavei') ? $this->Html->link($adotavel->tipos_adotavei->nome, ['controller' => 'TiposAdotaveis', 'action' => 'view', $adotavel->tipos_adotavei->id]) : '' ?></td>
            <td><?= $this->SimOuNao($adotavel->active); ?></td>              
            <td class="actions">
                <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fas fa-eye'])
                    /*.__('View')*/, ['action' => 'view', $adotavel->id], ['escape'=>false, 'alt'=>'Ver']) ?>
                <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'fas fa-edit'])
                    /*.__('Edit')*/, ['action' => 'edit', $adotavel->id], ['escape'=>false]) ?>
                <?= $this->Form->postLink(
                    $this->Html->tag('i','',['class'=>'fas fa-trash-alt'])
                    /*.__('Delete')*/, ['action' => 'delete', $adotavel->id], ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $adotavel->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!--<?= $this->Paginator->first(__('first')) ?>-->
        <?= $this->Paginator->prev(__('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next')) ?>
        <!--<?= $this->Paginator->last(__('last')) ?>-->
    </ul>
</nav>