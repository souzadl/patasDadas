<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento[]|\Cake\Collection\CollectionInterface $eventos
 */
use Cake\Core\Configure;
?>
<h4><?= __('Eventos') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('evento') ?></th>
            <th scope="col"><?= $this->Paginator->sort('local') ?></th>                     
            <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $evento): ?>
        <tr>
            <td><?= h($evento->evento) ?></td>
            <td><?= h($evento->local) ?></td>
            <td><?= $this->Html->image(Configure::read('App.imageEventoUrl') . $evento->imagem, ['style'=>'width:100px']) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($evento->id_evento, $evento->evento, $acoesPermitidas)?>   
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
