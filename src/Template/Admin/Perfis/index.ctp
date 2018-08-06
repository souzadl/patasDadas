<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perfl[]|\Cake\Collection\CollectionInterface $perfis
 */
?>
<h4><?= __('Perfis') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ativo') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($perfis as $perfil): ?>
        <tr>
            <td><?= h($perfil->nome) ?></td>
            <td><?= $perfil->ativo ? __('Sim') : __('Não') ?></td>
            <td class="actions">
            	<?= $this->Acoes->getAll($perfil->id, $perfil->nome, $acoesPermitidas)?>                          
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
