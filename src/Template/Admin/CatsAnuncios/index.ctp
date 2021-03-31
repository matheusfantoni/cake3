<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Categorias de Anúncios</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'CatsAnuncios', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
        ?>
    </div>
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="d-none d-lg-table-cell">Destaque Home</th>
                <th class="d-none d-sm-table-cell">Ordem</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catsAnuncios as $catsAnuncio) : ?>
                <tr>
                    <td><?= $this->Number->format($catsAnuncio->id) ?></td>
                    <td><?= h($catsAnuncio->nome) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                        echo "<span class='badge badge-" . $catsAnuncio->situation->color->cor . "'>" . $catsAnuncio->situation->nome_situacao . "</span>";
                        ?>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                        if ($catsAnuncio->destaque_home == 1) {
                            $badgeDestaque = "<span class='badge badge-success'>Sim</span>";
                            echo $this->Html->link(__($badgeDestaque), ['controller' => 'CatsAnuncios', 'action' => 'altCatDestHome', $catsAnuncio->id], ['escape' => false]);
                        } else {
                            $badgeDestaque = "<span class='badge badge-danger'>Não</span>";
                            echo $this->Html->link(__($badgeDestaque), ['controller' => 'CatsAnuncios', 'action' => 'altCatDestHome', $catsAnuncio->id], ['escape' => false]);
                        }
                        ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?= h($catsAnuncio->ordem) ?>
                    </td>
                    <td>
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(
                                __('<i class="fas fa-angle-double-up"></i>'),
                                [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'altOrdemCatsAnuncios',
                                    $catsAnuncio->id
                                ],
                                [
                                    'class' => 'btn btn-outline-info btn-sm',
                                    'escape' => false
                                ]
                            ) ?>

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'CatsAnuncios', 'action' => 'view', $catsAnuncio->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'CatsAnuncios', 'action' => 'edit', $catsAnuncio->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a categoria de anúncio # {0}?', $catsAnuncio->id)]) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'CatsAnuncios', 'action' => 'view', $catsAnuncio->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'CatsAnuncios', 'action' => 'edit', $catsAnuncio->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a categoria de anúncio # {0}?', $catsAnuncio->id)]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>