<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Usuários</h2>
    </div>
    <a href="#">
        <div class="p-2">
            <button class="btn btn-outline-success btn-sm">
                Cadastrar
            </button>
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
                    <td class="text-center">
                        <?php
                        echo $this->Html->link(('Ver '), ['action' => 'view', $usuario->id]);
                        echo $this->Html->link((' Editar '), ['action' => 'edit', $usuario->id]);
                        echo $this->Form->postLink((' Apagar'), [
                            'action' => 'delete',
                            $usuario->id
                        ], [
                            'confirm' => 'Realmente quer apagar o usuário?',
                            $usuario->id
                        ]);
                        ?>
                    <td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="users index large-9 medium-8 columns content">
    <h3><?php echo 'Lista de Usuários'; ?></h3>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('Primeira')); ?>
            <?php echo $this->Paginator->prev('< ' . __('Anterior')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('Próxima') . ' >'); ?>
            <?php echo $this->Paginator->last(__('Última') . ' >>'); ?>
        </ul>
        <p>
            <?php
            echo $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrado 
                {{current}} registro(s) do total de {{count}}')]);
            ?>
        </p>
    </div>

    <?php
    echo $this->Html->link(('Lista Usuários'), ['controller' => 'users', 'action' => 'index']);
    ?>
</div>