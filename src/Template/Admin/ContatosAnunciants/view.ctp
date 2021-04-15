<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'ContatosAnunciants', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosAnunciants', 'action' => 'delete', $contatosAnunciant->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o contato com anúnciante # {0}?', $contatosAnunciant->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'ContatosAnunciants', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosAnunciants', 'action' => 'delete', $contatosAnunciant->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar o contato com anúnciante # {0}?', $contatosAnunciant->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($contatosAnunciant->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($contatosAnunciant->nome) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($contatosAnunciant->email) ?></dd>

    <dt class="col-sm-3">Telefone</dt>
    <dd class="col-sm-9"><?= $contatosAnunciant->telefone ?></dd>

    <dt class="col-sm-3">Mensagem</dt>
    <dd class="col-sm-9"><?= h($contatosAnunciant->mensagem) ?></dd>

    <dt class="col-sm-3">Anúncio</dt>
    <dd class="col-sm-9">
        <?= $contatosAnunciant->has('anuncio') ? $this->Html->link($contatosAnunciant->anuncio->titulo, ['controller' => 'Anuncios', 'action' => 'view', $contatosAnunciant->anuncio->id]) : '' ?>
    </dd>

    <dt class="col-sm-3">Anunciante</dt>
    <dd class="col-sm-9">
        <?= $contatosAnunciant->has('anunciant') ? $this->Html->link($contatosAnunciant->anunciant->nome, ['controller' => 'Anunciants', 'action' => 'view', $contatosAnunciant->anunciant->id]) : '' ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($contatosAnunciant->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($contatosAnunciant->modified) ?></dd>

</dl>