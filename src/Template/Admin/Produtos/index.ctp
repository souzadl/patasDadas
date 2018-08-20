<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
use Cake\Core\Configure;
?>
<h4><?= __('Produtos') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('titulo', 'Título') ?></th>            
            <th scope="col"><?= $this->Paginator->sort('id_produto_categoria', 'Categoria') ?></th>
            <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
            <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ativo') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= h($produto->titulo) ?></td>            
            <td><?= h($produto->produtos_categoria->categoria) ?></td>
            <td><?= $this->Html->image(Configure::read('App.imageProdutoUrl') . $produto->imagem, ['style'=>'width:100px']) ?></td>
            <td><?= $this->Number->currency($produto->valor) ?></td>
            <td><?= $this->SimOuNao($produto->ativo) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($produto->id_produto, $produto->titulo, $acoesPermitidas)?>    
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>

