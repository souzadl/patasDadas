<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adoco[]|\Cake\Collection\CollectionInterface $adocoes
 */
?>
<h4><?= __('Adoções') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_animal') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($adocoes as $adoco): ?>
        <tr>
            <td><?= $this->Number->format($adoco->id_animal) ?></td>
            <td><?= h($adoco->nome) ?></td>
            <td><?= h($adoco->email) ?></td>
            <td><?= h($adoco->data_alteracao) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($adoco->id_adocao, $adoco->nome, $acoesPermitidas)?>  
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
