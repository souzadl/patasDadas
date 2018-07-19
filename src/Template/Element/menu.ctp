<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <?= $this->Html->image('patasdadas-header-logo.png', ['alt' => 'Patas Dadas', 'width' => '50', 'style' => 'margin-top: 5px;']); ?>  
        <!--<?= $this->fetch('title') ?>    -->        
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'], ['class' => 'nav-link']) ?> 
        </li>
        <?php if($login): ?>                      
            <li class="nav-item active"><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Conteúdos'), ['controller' => 'Conteudos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>            
            <li class="nav-item active"><?= $this->Html->link(__('Animais'), ['controller' => 'Animais', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Adoções'), ['controller' => 'Adocoes', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Apadrinhamento'), ['controller' => 'Apadrinhamentos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Pedidos'), ['controller' => 'Pedidos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Produtos'), ['controller' => 'Produtos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Eventos'), ['controller' => 'Eventos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="cadastros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Cadastros')?></a>            
                <div class="dropdown-menu" aria-labelledby="cadastros">
                    <?= $this->Html->link(__('Parceiros'), ['controller' => 'Parceiros', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Pontos de Coleta'), ['controller' => 'PontosColeta', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Mídias'), ['controller' => 'Midias', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Perguntas e Respostas'), ['controller' => 'PerguntasRespostas', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Pessoas'), ['controller' => 'Pessoas', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Padrinhos'), ['controller' => 'Padrinhos', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </li>
            <!--
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Tipos')?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?= $this->Html->link(__('Padrinhos'), ['controller' => 'TiposPadrinhos', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Adotáveis'), ['controller' => 'TiposAdotaveis', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
              </div>
            </li>     
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Admin')?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Ações'), ['controller' => 'Acoes', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Controles'), ['controller' => 'Controles', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
              </div>
            </li>-->                        
            <li class="nav-item active"><?= $this->Html->link(__('Logout {0}', $login), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?></li>
        <?php else: ?>
            <li class="nav-item active"><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Cadastro'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            <li class="nav-item active"><?= $this->Html->link(__('Relembrar Password'), ['controller' => 'Users', 'action' => 'rememberPassword'], ['class' => 'nav-link']) ?></li>
        <?php endif; ?>
      </ul>
    </div>
</nav>