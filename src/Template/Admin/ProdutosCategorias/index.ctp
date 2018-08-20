<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutosCategoria[]|\Cake\Collection\CollectionInterface $produtosCategorias
 */
?>
<h4><?= __('Categorias Produtos') ?></h4>
<?= $this->Acoes->getAdd($acoesPermitidas) ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_produto_categoria', ['label' => 'Id']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtosCategorias as $produtosCategoria): ?>
        <tr>
            <td><?= $this->Number->format($produtosCategoria->id_produto_categoria) ?></td>
            <td><?= h($produtosCategoria->categoria) ?></td>
            <td class="actions">
                <?= $this->Acoes->getList($produtosCategoria->id_produto_categoria, $produtosCategoria->categoria, $acoesPermitidas)?>   
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

