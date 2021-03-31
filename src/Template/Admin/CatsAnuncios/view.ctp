<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Categoria de Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'CatsAnuncios', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'CatsAnuncios', 'action' => 'edit', $catsAnuncio->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a categoria de anúncio # {0}?', $catsAnuncio->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'CatsAnuncios', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'CatsAnuncios', 'action' => 'edit', $catsAnuncio->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a catgoria de anúncio # {0}?', $catsAnuncio->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($catsAnuncio->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($catsAnuncio->nome) ?></dd>

    <dt class="col-sm-3">ícone</dt>
    <dd class="col-sm-9"><?= h($catsAnuncio->icone) ?> - <i class="<?= h($catsAnuncio->icone) ?>"></i></dd>

    <dt class="col-sm-3">Ordem</dt>
    <dd class="col-sm-9"><?= h($catsAnuncio->ordem) ?></dd>

    <dt class="col-sm-3">Destaque Home</dt>
    <dd class="col-sm-9">
        <?php
        if ($catsAnuncio->destaque_home == 1) {
            echo "<span class='badge badge-success'>Sim</span>";
        } else {
            echo "<span class='badge badge-danger'>Não</span>";
        }
        ?>
    </dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9">
        <?php
        echo "<span class='badge badge-" . $catsAnuncio->situation->color->cor . "'>" . $catsAnuncio->situation->nome_situacao . "</span>";
        ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($catsAnuncio->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($catsAnuncio->modified) ?></dd>

</dl>