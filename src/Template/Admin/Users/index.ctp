<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Usuários</h2>
    </div>
    <a href="#">
        <div class="p-2">
            <?=
                $this->Html->link(__('Cadastrar'),['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
            ?>
        </div>
    </a>
</div>

<?= $this->Flash->render() ?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="d-none d-sm-table-cell">E-mail</th>
                <th class="d-none d-lg-table-cell">Data do Cadastro</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($usuarios as $usuario) : ?>

                <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->name; ?></td>
                    <td class="d-none d-sm-table-cell"><?php echo $usuario->email; ?></td>
                    <td class="d-none d-lg-table-cell"><?php echo $usuario->created; ?></td>
                    <td>
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'users', 'action' => 'view', $usuario->id], ['class' => 'btn btn-outline-primary btn-sm']); ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'users', 'action' => 'edit', $usuario->id], ['class' => 'btn btn-outline-warning btn-sm']); ?>

                            <?= $this->Html->link(__('Apagar'), ['controller' => 'users', 'action' => 'delete', $usuario->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o usuário # {0}?', $usuario->id)]); ?>
                        </span>

                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                <?= $this->Html->link(('Visualizar'), ['controller' => 'users', 'action' => 'view', $usuario->id], ['class' => 'dropdown-item']); ?>

                                <?= $this->Html->link(('Editar'), ['controller' => 'users', 'action' => 'edit', $usuario->id], ['class' => 'dropdown-item']); ?>

                                <?= $this->Form->postLink(('Apagar'), ['controller' => 'users', 'action' => 'delete', $usuario->id], ['class' => 'dropdown-item', 'confirm' => 'Realmente deseja apagar o usuário?', $usuario->id]); ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination'); ?>
</div>