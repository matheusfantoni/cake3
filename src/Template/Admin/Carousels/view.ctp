<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Carousel</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Editar'), ['controller' => 'Carousels', 'action' => 'edit', $carousel->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Carousels', 'action' => 'delete', $carousel->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o carousel # {0}?', $carousel->id)]) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Carousels', 'action' => 'edit', $carousel->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Carousels', 'action' => 'delete', $carousel->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o carousel # {0}?', $user->id)]) ?>
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
            <?php if (!empty($carousel->imagem)) { ?>
                <?= $this->Html->image('../files/carousel/' . $carousel->id . '/' . $carousel->imagem, ['width' => '250', 'height' => '120']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Carousels',
                            'action' => 'alterarFotoCarousel',
                            $carousel->id
                        ],
                        [
                            'escape' => false
                        ]
                    ); ?>
                </div>

            <?php } else { ?>
                <?= $this->Html->image('../files/carousel/preview_img.jpg', ['width' => '250', 'height' => '120']) ?>&nbsp;

                <div class="edit">
                    <?= $this->Html->link(
                        '<i class="fas fa-pencil-alt"></i>',
                        [
                            'controller' => 'Carousels',
                            'action' => 'alterarFotoCarousel',
                            $carousel->id
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
    <dd class="col-sm-9"><?= $this->Number->format($carousel->id) ?></dd>

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($carousel->nome_carousel) ?></dd>

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($carousel->titulo) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($carousel->descricao) ?></dd>

    <dt class="col-sm-3">Titulo do Botão</dt>
    <dd class="col-sm-9"><?= h($carousel->titulo_botao) ?></dd>

    <dt class="col-sm-3">Link do Botão</dt>
    <dd class="col-sm-9"><?= h($carousel->link) ?></dd>

    <dt class="col-sm-3">Cor do Botão</dt>
    <dd class="col-sm-9">
        <?php if (!empty($carousel->color->cor)) { ?>
            <button type="button" class="btn btn-<?= h($carousel->color->cor) ?> btn-sm">
                <?= h($carousel->color->nome_cor) ?>
            </button>
        <?php } ?>
    </dd>

    <dt class="col-sm-3">Posição do Texto</dt>
    <dd class="col-sm-9"><?= h($carousel->position->nome_posicao) ?></dd>

    <dt class="col-sm-3">Ordem do Slide</dt>
    <dd class="col-sm-9"><?= h($carousel->ordem) ?></dd>

    <dt class="col-sm-3">Situação do Slide</dt>
    <dd class="col-sm-9">
        <?php
        if ($carousel->situation->id == 1) {
            echo "<span class='badge badge-success'>" . $carousel->situation->nome_situacao . "</span>";
        } else {
            echo "<span class='badge badge-danger'>" . $carousel->situation->nome_situacao . "</span>";
        }
        ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($carousel->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Alteração</dt>
    <dd class="col-sm-9"><?= h($carousel->modified) ?></dd>

</dl>