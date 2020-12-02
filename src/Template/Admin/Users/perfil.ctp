<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Usuário</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">

            <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'editPerfil'], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Html->link(__('Editar Senha'), ['controller' => 'Users', 'action' => 'editSenhaPerfil'], ['class' => 'btn btn-outline-danger btn-sm']) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'editPerfil'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar Senha'), ['controller' => 'Users', 'action' => 'editSenhaPerfil'], ['class' => 'dropdown-item']) ?>

            </div>
        </div>
    </div>
</div>
<hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $usuario['id'] ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= $usuario['name'] ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= $usuario['email'] ?></dd>

    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9"><?= $usuario['username'] ?></dd>
</dl>