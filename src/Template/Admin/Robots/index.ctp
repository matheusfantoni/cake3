<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Situação nos Buscadores</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Cadastrar'), ['controller' => 'Robots', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Cadastrar'), ['controller' => 'Robots', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($robots as $robot) : ?>
                <tr>
                    <td><?= $this->Number->format($robot->id) ?></td>
                    <td><?= h($robot->nome) ?></td>
                    <td><?= h($robot->tipo) ?></td>
                    <td class="text-center">
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Robots', 'action' => 'view', $robot->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'Robots', 'action' => 'edit', $robot->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Robots', 'action' => 'delete', $robot->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar a situação nos buscadores # {0}?', $robot->id)]) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Robots', 'action' => 'view', $robot->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'Robots', 'action' => 'edit', $robot->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Robots', 'action' => 'delete', $robot->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar a situação nos buscadores # {0}?', $robot->id)]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>