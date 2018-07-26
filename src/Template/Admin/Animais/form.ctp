<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animai $animai
 */
?>
<div class="animais form large-9 medium-8 columns content">
    <legend><?= $this->RotuloAcao($action, 'Animal'); ?></legend>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cadastro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Galeria de Fotos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#padrinhos" role="tab" aria-controls="padrinhos" aria-selected="false">Apadrinhamento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#prontuario" role="tab" aria-controls="prontuario" aria-selected="false">Prontuário</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#legado" role="tab" aria-controls="legado" aria-selected="false">Legado</a>
        </li> 
    </ul>
    <?php include_once 'historicoPesoModal.ctp';?>
    <?php include_once 'doencaCronicaModal.ctp';?>
    <?php include_once 'alimentacaoEspecialModal.ctp';?>
    <?php include_once 'deficienciaFisicaModal.ctp';?>
    <?php include_once 'medicacaoModal.ctp';?>
    <?php include_once 'vacinaModal.ctp';?>
    <?php include_once 'serestoModal.ctp';?>
    <?php include_once 'vermifugoModal.ctp';?>
    <?php include_once 'alteracaoModal.ctp';?>
    <?php include_once 'alteracaoDetalheModal.ctp';?>

    <?= $this->Form->create($animai) ?>
    <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> > 

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col">
                        <?php 
                        echo $this->Form->control('nome');
                        echo $this->Form->control('sexo', [
                            'type' => 'radio', 
                            'options' => ['M'=>'Macho', 'F'=>'Fêmea'],
                            'templates' => ['nestingLabel'=>'{{hidden}}<div class="custom-control custom-radio">{{input}}<label{{attrs}} class="custom-control-label">{{text}}</label></div>']
                            ]);
                        echo $this->Form->control('data_aparicao', ['empty' => true]);
                        echo $this->Form->control('porte', ['options'=>['P'=>'Pequeno','M'=>'Médio','G'=>'Grande']]);
                        echo $this->Form->control('condicao', ['options'=>['DI'=>'Disponível','A'=>'Adotado','D'=>'Desaparecido','O'=>'Óbito','I'=>'Indisponível']]);
                        echo $this->Form->control('foto');
                        echo $this->Form->control('perfil_instagram');
                        ?>    
                    </div>
                    <div class="col">                      
                        <?php                         
                        echo $this->Form->control('data_nascimento', ['empty' => true]);  
                        echo $this->Form->control('filhote', ['type' => 'checkbox']);
                        echo $this->Form->control('tipo', [
                            'type' => 'radio', 
                            'options' => ['C'=>'Cão', 'G'=>'Gato'],
                            'templates' => ['nestingLabel'=>'{{hidden}}<div class="custom-control custom-radio">{{input}}<label{{attrs}} class="custom-control-label">{{text}}</label></div>']
                            ]);                
                        echo $this->Form->control('local_aparicao');
                        echo $this->Form->control('pelagem', ['options'=>['C'=>'Curta','L'=>'Longa']]);
                        echo $this->Form->control('data_condicao', ['empty' => true]);
                        echo $this->Form->control('perfil_facebook');
                        echo $this->Form->control('album_facebook');
                        ?>
                    </div>
                </div>
                <?php
                echo $this->Form->control('temperamento');
                echo $this->Form->control('observacao');
                echo $this->Form->control('observacao_privada');
                
                ?>
            </div>
            <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab"></div>
            <div class="tab-pane fade" id="padrinhos" role="tabpanel" aria-labelledby="padrinhos-tab">
                <?php
                echo $this->Form->control('padrinho_racao', ['options' => $padrinhos]);
                echo $this->Form->control('padrinho_castracao', ['options' => $padrinhos]);
                echo $this->Form->control('padrinho_vacinas', ['options' => $padrinhos]);
                echo $this->Form->control('padrinho_pulgas', ['options' => $padrinhos]);
                ?>
            </div>
            <div class="tab-pane fade" id="prontuario" role="tabpanel" aria-labelledby="prontuario-tab">
                <div class="row">
                    <div class="col">
                        <?php include_once 'historicoPeso.ctp';?>
                    </div>
                    <div class="col">
                        <?php include_once 'doencasCronicas.ctp';?>
                        <?php include_once 'alimentacoesEspeciais.ctp';?>
                        <?php include_once 'deficienciasFisicas.ctp';?>                      
                    </div>
                </div>
                <?php include_once 'medicacoes.ctp';?>   
                <?php include_once 'checklist.ctp';?> 
            </div>
            <div class="tab-pane fade" id="legado" role="tabpanel" aria-labelledby="legado-tab">
                <?php
                echo $this->Form->control('tratamento', ['disabled']);
                echo $this->Form->control('check_castrado', ['disabled']);
                echo $this->Form->control('check_vermifugado', ['disabled']);
                echo $this->Form->control('check_vacinado', ['disabled']);
                echo $this->Form->control('data_castracao', ['empty' => true, 'disabled']);
                echo $this->Form->control('data_vacinacao', ['empty' => true, 'disabled']);
                echo $this->Form->control('data_vermifugacao', ['empty' => true, 'disabled']);
                ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>
</div>
