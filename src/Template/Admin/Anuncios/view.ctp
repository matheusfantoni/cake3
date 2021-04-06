<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Anuncios', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Anuncios', 'action' => 'edit', $anuncio->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anuncios', 'action' => 'delete', $anuncio->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o anúncio # {0}?', $anuncio->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Anuncios', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Anuncios', 'action' => 'edit', $anuncio->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anuncios', 'action' => 'delete', $anuncio->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar o anúncio # {0}?', $anuncio->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem</dt>
    <dd class="col-sm-9">
        <div class="img-perfil">
            <?php if(!empty($anuncio->imagem)){ ?>
            <?= $this->Html->image('../files/anuncio/'.$anuncio->id.'/'.$anuncio->imagem, ['width' => '250', 'height' => '200']) ?>&nbsp;

            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Anuncios',
                            'action' => 'alterarFotoAnuncio',
                            $anuncio->id
                        ],
                        [
                            'escape'=> false
                        ]
                    ); ?>
            </div>

            <?php } else { ?>
            <?= $this->Html->image('../files/anuncio/preview_img.jpg', ['width' => '250', 'height' => '200']) ?>&nbsp;

            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Anuncios',
                            'action' => 'alterarFotoAnuncio',
                            $anuncio->id
                        ],
                        [
                            'escape'=> false
                        ]
                    ); ?>
            </div>
            <?php } ?>
        </div>
    </dd>

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($anuncio->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($anuncio->titulo) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($anuncio->descricao) ?></dd>

    <dt class="col-sm-3">Conteúdo</dt>
    <dd class="col-sm-9"><?= h($anuncio->conteudo) ?></dd>

    <dt class="col-sm-3">Nome na URL</dt>
    <dd class="col-sm-9"><?= h($anuncio->slug) ?></dd>

    <dt class="col-sm-3">Palavra Chave</dt>
    <dd class="col-sm-9"><?= h($anuncio->keywords) ?></dd>

    <dt class="col-sm-3">Descrição para os buscadores</dt>
    <dd class="col-sm-9"><?= h($anuncio->description) ?></dd>

    <dt class="col-sm-3">Acessos</dt>
    <dd class="col-sm-9"><?= h($anuncio->qnt_acesso) ?></dd>

    <dt class="col-sm-3">Buscadores</dt>
    <dd class="col-sm-9"><?= h($anuncio->robot->nome) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= h($anuncio->user->name) ?></dd>

    <dt class="col-sm-3">Situação do Anúncio</dt>
    <dd class="col-sm-9">
        <?php echo "<span class='badge badge-". $anuncio->anuncios_situation->color->cor."'>".$anuncio->anuncios_situation->nome_situacao."</span>"; ?>
    </dd>

    <dt class="col-sm-3">Categoria</dt>
    <dd class="col-sm-9"><?= h($anuncio->cats_anuncio->nome) ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($anuncio->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($anuncio->modified) ?></dd>

</dl>