<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai[]|\Cake\Collection\CollectionInterface $animais
 */
?>
<h4><?= __('Animais') ?></h4>
<?= $this->element('acao_add') ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('porte') ?></th>
            <th scope="col"><?= $this->Paginator->sort('condicao') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animais as $animai): ?>
        <tr>
            <td><?= h($animai->nome) ?></td>
            <td><?= $animai->sexo = 'M' ? 'Macho' : 'Fêmea'?></td>
            <td>
                <?php 
                switch ($animai->porte){
                    case 'P': echo 'Pequeno'; break;
                    case 'M': echo 'Médio'; break;
                    case 'G': echo 'Grande'; break;
                    default : echo 'Filhote'; break;
                }
                ?>
            </td>
            <td>
                <?php 
                switch ($animai->condicao){
                    case 'A': echo 'Adotado'; break;
                    case 'DI': echo 'Disponível'; break;
                    case 'D': echo 'Desaparecido'; break;
                    case 'O' : echo 'Óbito'; break;
                    case 'I' : echo 'Indisponível'; break;
                }
                h($animai->condicao) 
                ?>
            </td>
            <td class="actions"> <?= $this->element('acoes_lista', ['id' => $animai->id_animal, 'descDel' => $animai->nome]) ?> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>

