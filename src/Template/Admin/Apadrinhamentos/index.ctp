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
            <th scope="col"><?= $this->Paginator->sort('id_apadrinhamento', ['label'=>'Id']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('Animais.nome', ['label'=>'Animal']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('Padrinhos.nome', ['label'=>'Padrinho']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('ApadrinhamentosTipos.tipo_apadrinhamento', ['label'=>'Tipo']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>            
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead> 
    <tbody>
            <?php foreach ($apadrinhamentos as $apadrinhamento): ?>
        <tr>
            <td><?= $apadrinhamento->id_apadrinhamento ?></td>
            <td><?= $apadrinhamento->animais['nome'] ?></td>
            <td><?= $apadrinhamento->padrinhos['nome'] ?></td>
            <td><?= h($apadrinhamento->apadrinhamentostipos['tipo_apadrinhamento']) ?></td>
            <td>
                <?php
                switch ($apadrinhamento->status) {	
                    case 1:
                        $result = "Aguardando pagamento";
                        break;
                    case 2:
                        $result = "Em análise";
                        break;
                    case 3:
                        $result = "Paga";
                        break;
                    case 4:
                        $result = "Disponível";
                        break;
                    case 5:
                        $result = "Em disputa";
                        break;
                    case 6:
                        $result = "Devolvida";
                        break;
                    case 7:
                        $result = "Cancelada";
                        break;
                    default:
                        $result = "Aguardando pagamento";
		}
                echo $result;
                ?>
            </td>           
            <td><?= date('d/m/Y H:i:s', strtotime($apadrinhamento->data_alteracao)) ?></td>
            <td class="actions">
                <?= $this->element('acoes_lista', ['id' => $apadrinhamento->id_apadrinhamento, 'descDel' => $apadrinhamento->id_apadrinhamento]) ?>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('paginacao') ?>
