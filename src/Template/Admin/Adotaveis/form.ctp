<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei $adotavei
 */
?>
 <div class="adotaveis form large-9 medium-8 columns content">
    <?= $this->Form->create($adotavel, ['type' => 'file']) ?>          
     <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >
         <legend><?= $this->RotuloAcao($action, 'Adotável'); ?></legend>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#historico_medico" role="tab" aria-controls="historico_medico" aria-selected="false">Histórico Médico</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#padrinhos" role="tab" aria-controls="padrinhos" aria-selected="false">Padrinhos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
                echo $this->Form->control('tipos_adotaveis_id', ['options' => $tiposAdotaveis, 'label'=>'Tipo Adotável']);               
                echo $this->Form->control('nome');
                echo $this->Form->control('porte', ['options' => ['P'=>'Pequeno','M'=>'Médio','G'=>'Grande']]);
                echo $this->Form->control('sexo', ['type' => 'radio', 'options' => ['M'=>'M', 'F'=>'F']]);
                echo $this->Form->control('idade');
                echo $this->Form->control('vacinado');
                echo $this->Form->control('vermifugado');
                echo $this->Form->control('castrado');
                echo $this->Form->control('temperamento');
                echo $this->Form->control('descricao_site', ['label'=>'Descrição Site']);                
                echo $this->Form->control('url_facebook');
                echo $this->Form->control('url_intagram');
                echo $this->Form->control('active');
            ?>
          </div>
          <div class="tab-pane fade" id="historico_medico" role="tabpanel" aria-labelledby="historico_medico-tab">
              <?= $this->Form->control('novo_historico', ['type' => 'textarea', 'label'=>'Novo Histórico']); ?>
              <legend>Entradas</legend>
              <?= $this->Text->autoParagraph(h($adotavel->historico_medico)); ?>
          </div>
          <div class="tab-pane fade" id="padrinhos" role="tabpanel" aria-labelledby="padrinhos-tab">
            <?php
                //var_dump($adotavel->padrinhos);
                foreach ($tiposPadrinhos as $tipoPadrinho) {
                    $idPessoa = '';
                    foreach ($adotavel->padrinhos as $padrinho){
                        if($padrinho->tipos_padrinhos_id === $tipoPadrinho->id){
                            $idPessoa = $padrinho->pessoas_id;
                            //var_dump($padrinho->pad);
                        }
                    }
                    echo $this->Form->control($tipoPadrinho->nome, 
                        ['options' => $padrinhosDisponiveis, 
                         //'name' => $tipoPadrinho->nome,
                         'value' => $idPessoa,
                         'empty' => 'Escolha um']);

                }
            ?>              
          </div>
          <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab"> 
                <?php 
                    echo $this->Form->control('fotos[]', [
                        'label' => '',
                        'type' => 'file',
                        'multiple' => 'true'
                    ]);
                    //var_dump($expression)
                    foreach ($adotavel->fotos as $foto){
                        echo $this->Html->image('fotos/'.$foto->nome, ['class'=>'thumbnail']);
                    //    echo $this->Form->imput('fotos', ['type'=>'file']); 
                    }
                ?>
          </div>
        </div>
    <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>   
</div>


