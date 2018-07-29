<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="float: none;margin: auto;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Autenticação</h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create() ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuário" name="login" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar">    
                        <?= $this->Html->link(__('Relembrar Senha'), ['controller' => 'Users', 'action' => 'relembrarPassword'], []) ?>
                    </fieldset>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

