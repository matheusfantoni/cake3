<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Situação dos Buscadores</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Robots', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Robots', 'action' => 'edit', $robot->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Robots', 'action' => 'delete', $robot->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar a categoria de anúncio # {0}?', $robot->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Robots', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Robots', 'action' => 'edit', $robot->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Robots', 'action' => 'delete', $robot->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar a catgoria de anúncio # {0}?', $robot->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($robot->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($robot->nome) ?></dd>

    <dt class="col-sm-3">Tipo</dt>
    <dd class="col-sm-9"><?= h($robot->tipo) ?></dd>

    <dt class="col-sm-3">Cadastrado</dt>
    <dd class="col-sm-9"><?= h($robot->created) ?></dd>

    <dt class="col-sm-3">Alteração</dt>
    <dd class="col-sm-9"><?= h($robot->modified) ?></dd>
</dl>