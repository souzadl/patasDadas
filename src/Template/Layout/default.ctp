<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patas Dadas</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('main') ?>   
    <?= $this->Html->css('all') ?>    
    <?= $this->Html->script('jquery-3.3.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('form') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>    
    <?= $this->element('menu') ?>
    <?= $this->Flash->render() ?>
    <main role="main" class="container">

      <div class="starter-template">
        <?= $this->fetch('content') ?>
      </div>

    </main>
  </body>
</html>
