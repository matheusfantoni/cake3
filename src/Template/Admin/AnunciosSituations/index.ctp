<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Situação de Anúncios</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Cadastrar'), ['controller' => 'AnunciosSituations', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Cadastrar'), ['controller' => 'AnunciosSituations', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
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
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anunciosSituations as $anunciosSituation) : ?>
                <tr>
                    <td><?= $this->Number->format($anunciosSituation->id) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                        echo "<span class='badge badge-" . $anunciosSituation->color->cor . "'>" . $anunciosSituation->nome_situacao . "</span>";
                        ?>
                    </td>
                    <td class="text-center">
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'AnunciosSituations', 'action' => 'view', $anunciosSituation->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'AnunciosSituations', 'action' => 'edit', $anunciosSituation->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'AnunciosSituations', 'action' => 'delete', $anunciosSituation->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a situação de anúncio # {0}?', $anunciosSituation->id)]) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'AnunciosSituations', 'action' => 'view', $anunciosSituation->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'AnunciosSituations', 'action' => 'edit', $anunciosSituation->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'AnunciosSituations', 'action' => 'delete', $anunciosSituation->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a situação de anúncio # {0}?', $anunciosSituation->id)]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>