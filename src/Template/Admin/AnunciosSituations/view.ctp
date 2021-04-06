<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Situação de Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'AnunciosSituations', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'AnunciosSituations', 'action' => 'edit', $anunciosSituation->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'AnunciosSituations', 'action' => 'delete', $anunciosSituation->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a situação de anúncio # {0}?', $anunciosSituation->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'AnunciosSituations', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'AnunciosSituations', 'action' => 'edit', $anunciosSituation->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'AnunciosSituations', 'action' => 'delete', $anunciosSituation->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a situação de anúncio # {0}?', $anunciosSituation->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($anunciosSituation->id) ?></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9">
        <?php
        echo "<span class='badge badge-" . $anunciosSituation->color->cor . "'>" . $anunciosSituation->nome_situacao . "</span>";
        ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($anunciosSituation->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($anunciosSituation->modified) ?></dd>

</dl>