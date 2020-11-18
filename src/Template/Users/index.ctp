<div class="users index large-12 medium-12 columns content">
    <h3><?php echo 'Lista de Usuários'; ?></h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->name; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td>
                        <?php
                        echo $this->Html->link(('Ver'), ['action' => 'view', $usuario->id]);
                        ?>
                        Editar Apagar</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Html->link(__('Cadastrar usuário'),  ['action' => 'add']) ?>
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