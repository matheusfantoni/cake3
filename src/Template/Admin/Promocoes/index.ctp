<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Promoção</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'Promocoes', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
        ?>
    </div>
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="d-none d-sm-table-cell">Acessos</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promocoes as $promocao) : ?>
                <tr>
                    <td><?= $this->Number->format($promocao->id) ?></td>
                    <td><?= h($promocao->titulo) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                        //echo "<span class='badge badge-". $promocao->anuncios_situation->color->cor."'>".$anuncio->anuncios_situation->nome_situacao."</span>";
                        echo "<span class='badge badge-" . $promocao->situation->color->cor . "'>" . $promocao->situation->nome_situacao . "</span>";
                        ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?= $this->Number->format($promocao->qnt_acesso) ?>
                    </td>
                    <td>
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Promocoes', 'action' => 'view', $promocao->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Html->link(__('Editar'), ['controller' => 'Promocoes', 'action' => 'edit', $promocao->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar a promoção # {0}?', $promocao->id)]) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Promocoes', 'action' => 'view', $promocao->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Html->link(__('Editar'), ['controller' => 'Promocoes', 'action' => 'edit', $promocao->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar a promoção # {0}?', $promocao->id)]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('pagination'); ?>
</div>