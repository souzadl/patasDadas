<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<h4><?= __('Perfís') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role): ?>
        <tr>
            <td><?= $this->Number->format($role->id) ?></td>
            <td><?= h($role->nome) ?></td>
            <td><?= $this->SimOuNao($role->active) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $role->id]) ?>
                <?= $this->Html->link($this->Html->tag('i','',['class'=>'fas fa-lock'])/*.__('Permissões')*/, 
                    ['action' => 'permissoes', $role->id], 
                    ['escape'=>false]) ?>                     
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
