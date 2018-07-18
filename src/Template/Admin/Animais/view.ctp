<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Animai'), ['action' => 'edit', $animai->id_animal]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Animai'), ['action' => 'delete', $animai->id_animal], ['confirm' => __('Are you sure you want to delete # {0}?', $animai->id_animal)]) ?> </li>
        <li><?= $this->Html->link(__('List Animais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Animai'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="animais view large-9 medium-8 columns content">
    <h3><?= h($animai->id_animal) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($animai->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($animai->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Local Aparicao') ?></th>
            <td><?= h($animai->local_aparicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($animai->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Porte') ?></th>
            <td><?= h($animai->porte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pelagem') ?></th>
            <td><?= h($animai->pelagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condicao') ?></th>
            <td><?= h($animai->condicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foto') ?></th>
            <td><?= h($animai->foto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Perfil Facebook') ?></th>
            <td><?= h($animai->perfil_facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Perfil Instagram') ?></th>
            <td><?= h($animai->perfil_instagram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Album Facebook') ?></th>
            <td><?= h($animai->album_facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Castrado') ?></th>
            <td><?= h($animai->check_castrado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Vermifugado') ?></th>
            <td><?= h($animai->check_vermifugado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Vacinado') ?></th>
            <td><?= h($animai->check_vacinado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Animal') ?></th>
            <td><?= $this->Number->format($animai->id_animal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padrinho Racao') ?></th>
            <td><?= $this->Number->format($animai->padrinho_racao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padrinho Castracao') ?></th>
            <td><?= $this->Number->format($animai->padrinho_castracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padrinho Vacinas') ?></th>
            <td><?= $this->Number->format($animai->padrinho_vacinas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padrinho Pulgas') ?></th>
            <td><?= $this->Number->format($animai->padrinho_pulgas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Cadastro') ?></th>
            <td><?= h($animai->data_cadastro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($animai->data_alteracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($animai->data_nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Aparicao') ?></th>
            <td><?= h($animai->data_aparicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Condicao') ?></th>
            <td><?= h($animai->data_condicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Castracao') ?></th>
            <td><?= h($animai->data_castracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Vacinacao') ?></th>
            <td><?= h($animai->data_vacinacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Vermifugacao') ?></th>
            <td><?= h($animai->data_vermifugacao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Temperamento') ?></h4>
        <?= $this->Text->autoParagraph(h($animai->temperamento)); ?>
    </div>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($animai->observacao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Observacao Privada') ?></h4>
        <?= $this->Text->autoParagraph(h($animai->observacao_privada)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tratamento') ?></h4>
        <?= $this->Text->autoParagraph(h($animai->tratamento)); ?>
    </div>
</div>
