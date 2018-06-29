<?php
$cakeDescription = 'Patas Dadas';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('starter-template') ?>
    <?= $this->Html->css('form') ?>    
    <?= $this->Html->script('https://code.jquery.com/jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('form') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
                  <?php if($username): ?>                      
                      <li class="nav-item active"><?= $this->Html->link(__('Pessoas'), ['controller' => 'Pessoas', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                      <li class="nav-item active"><?= $this->Html->link(__('Adotáveis'), ['controller' => 'Adotaveis', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
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
                            <?= $this->Html->link(__('Ações'), ['controller' => 'Acoes', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link(__('Controles'), ['controller' => 'Controles', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        </div>
                      </li>                        
                      <li class="nav-item active"><?= $this->Html->link(__('Logout {0}', $username), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?></li>
                  <?php else: ?>
                      <li class="nav-item active"><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?></li>
                      <li class="nav-item active"><?= $this->Html->link(__('Cadastro'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                      <li class="nav-item active"><?= $this->Html->link(__('Relembrar Password'), ['controller' => 'Users', 'action' => 'rememberPassword'], ['class' => 'nav-link']) ?></li>
                  <?php endif; ?>
          </ul>
            <!--
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
        </div>
    </nav> 

    <?= $this->Flash->render() ?>
    <main role="main" class="container">

      <div class="starter-template">
        <?= $this->fetch('content') ?>
      </div>

    </main>
  </body>
</html>
