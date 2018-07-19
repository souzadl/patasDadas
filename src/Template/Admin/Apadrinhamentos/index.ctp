<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apadrinhamento[]|\Cake\Collection\CollectionInterface $apadrinhamentos
 */
?>
<h4><?= __('Apadrinhamentos') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('Animais.nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Padrinhos.nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('type') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>            
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($apadrinhamentos as $apadrinhamento): ?>
        <tr>
            <td><?= $apadrinhamento->animais['nome'] ?></td>
            <td><?= $apadrinhamento->padrinhos['nome'] ?></td>
            <td><?= h($apadrinhamento->type) ?></td>
            <td><?= h($apadrinhamento->status) ?></td>           
            <td><?= h($apadrinhamento->date) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $apadrinhamento->id_apadrinhamento, 'descDel' => $apadrinhamento->id_apadrinhamento]) ?>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
