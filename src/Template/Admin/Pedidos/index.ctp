<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<h4><?= __('Pedidos') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_pagseguro') ?></th>                
            <th scope="col"><?= $this->Paginator->sort('data_pedido') ?></th>
            <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= h($pedido->id_pagseguro) ?></td>
            <td><?= h($pedido->data_pedido) ?></td>                
            <td><?= h($pedido->data_alteracao) ?></td>
            <td><?= h($pedido->status) ?></td>
            <td class="actions">
                    <?= $this->element('acoes_lista', ['id' => $pedido->id_pedido, 'descDel' => $pedido->id_pedido]) ?>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
