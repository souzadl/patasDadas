<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adotavei[]|\Cake\Collection\CollectionInterface $adotaveis
 */
use App\Model\Entity\Apadrinhamento;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <?= $this->Html->image('patasdadas-header-logo.png', ['alt' => 'Patas Dadas', 'width' => '50', 'style' => 'margin-top: 5px;']); ?>        
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(isset($userAuth)): ?>
        <ul class="navbar-nav mr-auto">
            <?php if($this->Controle->TemAcesso('Home', $userAuth)): ?>
            <li class="nav-item active"><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Users', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Conteudos', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Conteúdos'), ['controller' => 'Conteudos', 'action' => 'edit', 1], ['class' => 'nav-link']) ?></li>            
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Animais', $userAuth)): ?>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="animais" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Animais')?></a> 
                <div class="dropdown-menu" aria-labelledby="animais">
                    <?= $this->Html->link(__('Todos'), ['controller' => 'Animais', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Adotados'), ['controller' => 'Animais', 'action' => 'index', 'A'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Disponíveis'), ['controller' => 'Animais', 'action' => 'index', 'DI'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Indisponível'), ['controller' => 'Animais', 'action' => 'index', 'I'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Desaparecidos'), ['controller' => 'Animais', 'action' => 'index', 'D'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Óbito'), ['controller' => 'Animais', 'action' => 'index', 'O'], ['class' => 'nav-link']) ?>
                </div>
            </li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Adocoes', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Adoções'), ['controller' => 'Adocoes', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Apadrinhamentos', $userAuth)): ?>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="apadrinhamentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Apadrinhamentos')?></a> 
                <div class="dropdown-menu" aria-labelledby="apadrinhamentos">
                    <?= $this->Html->link(__('Todos'), ['controller' => 'Apadrinhamentos', 'action' => 'index'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Vencidos'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::VENCIDOS], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Pagos'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_PAGO], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Aguardando Pagamento'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_AGUARDANDO_PAGAMENTO], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Em Análise'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_EM_ANALISE], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Disponível'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_DISPONIVEL], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Em Disputa'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_EM_DISPUTA], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Devolvida'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_DEVOLVIDA], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link(__('Cancelada'), ['controller' => 'Apadrinhamentos', 'action' => 'index', Apadrinhamento::STATUS_CANCELADA], ['class' => 'nav-link']) ?>
                </div>
            </li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Pedidos', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Pedidos'), ['controller' => 'Pedidos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Produtos', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Produtos'), ['controller' => 'Produtos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?>
            <?php if($this->Controle->TemAcesso('Eventos', $userAuth)): ?>
            <li class="nav-item disabled"><?= $this->Html->link(__('Eventos'), ['controller' => 'Eventos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            <?php endif; ?> 
            <?php if($this->Controle->TemAcesso('Cadastros', $userAuth)): ?>
            <li class="nav-item disabled dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="cadastros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Cadastros')?></a>            
                <div class="dropdown-menu" aria-labelledby="cadastros">
                    <?php if($this->Controle->TemAcesso('Parceiros', $userAuth)){ echo $this->Html->link(__('Parceiros'), ['controller' => 'Parceiros', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                    <?php if($this->Controle->TemAcesso('PontosColeta', $userAuth)){ echo $this->Html->link(__('Pontos de Coleta'), ['controller' => 'PontosColeta', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                    <?php if($this->Controle->TemAcesso('Midias', $userAuth)){ echo $this->Html->link(__('Mídias'), ['controller' => 'Midias', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                    <?php if($this->Controle->TemAcesso('PerguntasRespostas', $userAuth)){ echo $this->Html->link(__('Perguntas e Respostas'), ['controller' => 'PerguntasRespostas', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                    <?php if($this->Controle->TemAcesso('Pessoas', $userAuth)){ echo $this->Html->link(__('Pessoas'), ['controller' => 'Pessoas', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                    <?php if($this->Controle->TemAcesso('Padrinhos', $userAuth)){ echo $this->Html->link(__('Padrinhos'), ['controller' => 'Padrinhos', 'action' => 'index'], ['class' => 'dropdown-item']); } ?>
                </div>
            </li> 
            <?php endif; ?> 
            <?php if($this->Controle->TemAcesso('Admin', $userAuth)): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _('Admin')?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?= $this->Html->link(__('Perfís'), ['controller' => 'Perfis', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Ações'), ['controller' => 'Acoes', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                  <?= $this->Html->link(__('Controles'), ['controller' => 'Controles', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
              </div>
            </li>  
            <?php endif; ?> 
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-user"></span> 
                    <strong><?=$userAuth['login']?></strong>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-center">
                                        <span class="fa fa-user icon-size"></span>
                                    </p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-left"><strong><?=$userAuth['pessoa']['nome']?></strong></p>
                                    <p class="text-left small"><?=$userAuth['pessoa']['email']?></p>
                                    <p class="text-left">
                                    	<?= $this->Html->link(__('Atualizar Dados'), ['controller' => 'Users', 'action' => 'edit', $userAuth['id_usuario']], ['class' => 'btn btn-primary btn-block btn-sm']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="navbar-login navbar-login-session">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>                                        
                                        <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger btn-block']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</nav>