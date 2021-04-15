<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Informação do Anunciante</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">

            <?= $this->Html->link(__('Editar'), ['controller' => 'Anunciants', 'action' => 'editAnunciante'], ['class' => 'btn btn-outline-warning btn-sm']) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                

                <?= $this->Html->link(__('Editar'), ['controller' => 'Anunciants', 'action' => 'editAnunciante'], ['class' => 'dropdown-item']) ?>

                
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
                            'action' => 'alterarImgAnunciante'
                            
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
                            'action' => 'alterarImgAnunciante'
                            
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

    <dt class="col-sm-3">Telefone</dt>
    <dd class="col-sm-9"><?= h($anunciant->telefone) ?></dd>

    <dt class="col-sm-3">Celular</dt>
    <dd class="col-sm-9"><?= h($anunciant->celular) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($anunciant->email) ?></dd>

    <dt class="col-sm-3 text-truncate">Cadastro</dt>
    <dd class="col-sm-9"><?= h($anunciant->created) ?></dd>
 
</dl>