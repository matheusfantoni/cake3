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
                <td>Ver Editar Apagar</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>