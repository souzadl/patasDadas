<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei $adotavei
 */
?>
 <div class="adotaveis form large-9 medium-8 columns content">
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
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#auditoria" role="tab" aria-controls="auditoria" aria-selected="false">Auditoria</a>
      </li>          
    </ul>    
    <?= $this->Form->create($adotavel, ['type' => 'file']) ?>          
        <fieldset <?= (isset($action) and $action === 'view') ? 'disabled' : ''; ?> >        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
                echo $this->Form->control('tipos_adotaveis_id', ['options' => $tiposAdotaveis, 'label'=>'Tipo Adotável']);               
                echo $this->Form->control('nome');
                echo $this->Form->control('porte', ['options' => ['P'=>'Pequeno','M'=>'Médio','G'=>'Grande']]);
                echo $this->Form->control('sexo', [
                    'type' => 'radio', 
                    'options' => ['M'=>'Macho', 'F'=>'Fêmea'],
                    'templates' => ['nestingLabel'=>'{{hidden}}<div class="custom-control custom-radio">{{input}}<label{{attrs}} class="custom-control-label">{{text}}</label></div>']
                    ]);
                echo $this->Form->control('data_nascimento', [
                    'minYear' => date('Y') - 20
                ]);
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
                foreach ($tiposPadrinhos as $tipoPadrinho) {
                    $idPessoa = '';
                    foreach ($adotavel->padrinhos as $padrinho){
                        if($padrinho->tipos_padrinhos_id === $tipoPadrinho->id){
                            $idPessoa = $padrinho->pessoas_id;
                        }
                    }
                    echo $this->Form->control($tipoPadrinho->nome, 
                        ['options' => $padrinhosDisponiveis, 
                         'value' => $idPessoa,
                         'empty' => 'Escolha um']);

                }
            ?>              
          </div>
          <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab"> 
                <div class="custom-file">
                    <input type="file" name="fotosSelecionadas[]" multiple="multiple" id="fotosselecionadas" class="custom-file-input">
                    <label class="custom-file-label" for="fotosSelecionadas">Escolha os arquivos...</label>
                    <div class="invalid-feedback">Nenhum arquivo selecionado</div>
                </div>       
                <?php 
                    /*echo $this->Form->control('fotosSelecionadas[]', [
                        'label' => '',
                        'type' => 'file',
                        'multiple' => 'true'
                    ]);*/
                    $fotos = array();
                    foreach ($adotavel->fotos as $foto){
                        $fotos[$foto->id] = $this->Html->image('fotos/'.$foto->nome, ['class'=>'thumbnail']);
                    }
                    echo $this->Form->control('fotosArmazenadas',[
                        'label' => 'Fotos Armazenadas - Marque as que devem ser removidas.',
                        'multiple' => 'checkbox',
                        'options' => $fotos,
                        'escape' => false
                    ]);
                ?>
          </div>
            <div class="tab-pane fade" id="auditoria" role="tabpanel" aria-labelledby="auditoria-tab"> 
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Usuário última alteração') ?></th>
                        <td><?= ($adotavel->has('user')) ? h($adotavel->user->username) : ''?></td>
                    </tr>                    
                    <tr>
                        <th scope="row"><?= __('Criado') ?></th>
                        <td><?= h($adotavel->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modificado') ?></th>
                        <td><?= h($adotavel->modified) ?></td>
                    </tr>                        
                </table>
            </div>
        </div>       
    </fieldset>
     <?= $this->Form->button(__('Submit'), [(isset($action) and $action === 'view') ? 'disabled' : '']) ?>
    <?= $this->Form->end() ?>   
</div>



