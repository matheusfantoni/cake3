<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Promoção</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Promocoes', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Promocoes', 'action' => 'edit', $promocao->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar a promoção # {0}?', $promocao->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Promocoes', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Promocoes', 'action' => 'edit', $promocao->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar o anúncio # {0}?', $promocao->id)]) ?>
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
            <?php if (!empty($promocao->imagem)) { ?>
                <?= $this->Html->image('../files/promocao/' . $promocao->id . '/' . $promocao->imagem, ['width' => '250', 'height' => '127']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Promocoes',
                            'action' => 'alterarFotoPromocao',
                            $promocao->id
                        ],
                        [
                            'escape' => false
                        ]
                    ); ?>
                </div>

            <?php } else { ?>
                <?= $this->Html->image('../files/promocao/preview_img.jpg', ['width' => '250', 'height' => '200']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Anuncios',
                            'action' => 'alterarFotoPromocao',
                            $promocao->id
                        ],
                        [
                            'escape' => false
                        ]
                    ); ?>
                </div>
            <?php } ?>
        </div>
    </dd>

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9"><?= $this->Number->format($promocao->id) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($promocao->titulo) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($promocao->descricao) ?></dd>

    <dt class="col-sm-3">Conteúdo</dt>
    <dd class="col-sm-9"><?= $promocao->conteudo ?></dd>

    <dt class="col-sm-3">Nome na URL</dt>
    <dd class="col-sm-9"><?= h($promocao->slug) ?></dd>

    <dt class="col-sm-3">Palavra Chave</dt>
    <dd class="col-sm-9"><?= h($promocao->keywords) ?></dd>

    <dt class="col-sm-3">Descrição para os buscadores</dt>
    <dd class="col-sm-9"><?= h($promocao->description) ?></dd>

    <dt class="col-sm-3">Acessos</dt>
    <dd class="col-sm-9"><?= h($promocao->qnt_acesso) ?></dd>

    <dt class="col-sm-3">Buscadores</dt>
    <dd class="col-sm-9"><?= h($promocao->robot->nome) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= h($promocao->user->name) ?></dd>

    <dt class="col-sm-3">Situação da Promoção</dt>
    <dd class="col-sm-9">
        <?php echo "<span class='badge badge-" . $promocao->situation->color->cor . "'>" . $promocao->situation->nome_situacao . "</span>"; ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($promocao->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($promocao->modified) ?></dd>

</dl>