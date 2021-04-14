<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Anunciante</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Anunciants', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Anunciants', 'action' => 'edit', $anunciant->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anunciants', 'action' => 'delete', $anunciant->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o anunciante # {0}?', $anunciant->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Anunciants', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Anunciants', 'action' => 'edit', $anunciant->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anunciants', 'action' => 'delete', $anunciant->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar o anunciante # {0}?', $anunciant->id)]) ?>
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
            <?php if (!empty($anunciant->imagem)) { ?>
                <?= $this->Html->image('../files/anunciant/' . $anunciant->id . '/' . $anunciant->imagem, ['width' => '250', 'height' => '200']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Anunciants',
                            'action' => 'alterarFotoAnunciante',
                            $anunciant->id
                        ],
                        [
                            'escape' => false
                        ]
                    ); ?>
                </div>

            <?php } else { ?>
                <?= $this->Html->image('../files/anunciant/preview_img.jpg', ['width' => '250', 'height' => '200']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Anunciants',
                            'action' => 'alterarFotoAnunciante',
                            $anunciant->id
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
    <dd class="col-sm-9"><?= $this->Number->format($anunciant->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($anunciant->nome) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($anunciant->descricao) ?></dd>

    <dt class="col-sm-3">Nome na URL</dt>
    <dd class="col-sm-9"><?= h($anunciant->slug) ?></dd>

    <dt class="col-sm-3">Palavra Chave</dt>
    <dd class="col-sm-9"><?= h($anunciant->keywords) ?></dd>

    <dt class="col-sm-3">Descrição para os buscadores</dt>
    <dd class="col-sm-9"><?= h($anunciant->description) ?></dd>

    <dt class="col-sm-3">Acessos</dt>
    <dd class="col-sm-9"><?= h($anunciant->qnt_acesso) ?></dd>

    <dt class="col-sm-3">Telefone</dt>
    <dd class="col-sm-9"><?= h($anunciant->telefone) ?></dd>

    <dt class="col-sm-3">Celular</dt>
    <dd class="col-sm-9"><?= h($anunciant->celular) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($anunciant->email) ?></dd>

    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= h($anunciant->user->name) ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($anunciant->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($anunciant->modified) ?></dd>

</dl>