<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Categorias de Anúncios Destaque</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Cadastrar'), ['controller' => 'CatsAnuncios', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']) ?>

            <?= $this->Html->link(__('Listar'), ['controller' => 'CatsAnuncios', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Cadastrar'), ['controller' => 'CatsAnuncios', 'action' => 'add'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Listar Destaque'), ['controller' => 'CatsAnuncios', 'action' => 'index', $catsAnuncio->id], ['class' => 'dropdown-item']) ?>

            </div>
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
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="d-none d-lg-table-cell">Destaque Home</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catAnuncioDests as $catAnuncioDest) : ?>
                <tr>
                    <td><?= $this->Number->format($catAnuncioDest->id) ?></td>
                    <td><?= h($catAnuncioDest->nome) ?></td>
                    <td class="d-none d-lg-table-cell">

                        <?php

                        echo "<span class='badge badge-" . $catAnuncioDest->situation->color->cor . "'>" . $catAnuncioDest->situation->nome_situacao . "</span>";
                        ?>
                    </td>

                    <td class="d-none d-lg-table-cell">
                        <?php
                        if ($catAnuncioDest->destaque_home == 1) {
                            $badgeDestaque = "<span class='badge badge-success'>Sim</span>";
                            echo $this->Html->link(__($badgeDestaque), [
                                'controller' => 'CatsAnuncios',
                                'action' => 'altCatDestHome', $catAnuncioDest->id
                            ], ['escape' => false]);
                        } else {
                            $badgeDestaque = "<span class='badge badge-danger'>Não</span>";
                            echo $this->Html->link(__($badgeDestaque), [
                                'controller' => 'CatsAnuncios',
                                'action' => 'altCatDestHome', $catAnuncioDest->id
                            ], ['escape' => false]);
                        }
                        ?>
                    </td>

                    <td>
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(
                                __('Visualizar'),
                                [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'view', $catAnuncioDest->id
                                ],
                                ['class' => 'btn btn-outline-primary btn-sm']
                            ) ?>

                            <?= $this->Html->link(
                                __('Editar'),
                                [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'edit', $catAnuncioDest->id
                                ],
                                ['class' => 'btn btn-outline-warning btn-sm']
                            ) ?>

                            <?= $this->Form->postLink(
                                __('Apagar'),
                                [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'delete', $catAnuncioDest->id
                                ],
                                [
                                    'class' => 'btn btn-outline-danger btn-sm',
                                    'confirm' => __(
                                        'Relamente deseja apagar a categoria de anúncio # {0}?',
                                        $catAnuncioDest->id
                                    )
                                ]
                            ) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'view', $catAnuncioDest->id
                                ], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'edit', $catAnuncioDest->id
                                ], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), [
                                    'controller' => 'CatsAnuncios',
                                    'action' => 'delete', $catAnuncioDest->id
                                ], [
                                    'class' => 'dropdown-item',
                                    'confirm' => __('Realmente deseja apagar a categoria de anúncio # {0}?', $catAnuncioDests->id)
                                ]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>