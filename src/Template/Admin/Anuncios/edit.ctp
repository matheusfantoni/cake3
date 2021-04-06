<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Anuncios', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Anuncios', 'action' => 'view', $anuncio->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anuncios', 'action' => 'delete', $anuncio->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar o anúncio # {0}?', $anuncio->id)]) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Anuncios', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Anuncios', 'action' => 'view', $anuncio->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Anuncios', 'action' => 'delete', $anuncio->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar o anúncio # {0}?', $anuncio->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($anuncio) ?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Titulo</label>
        <?= $this->Form->control('titulo', ['class' => 'form-control', 'placeholder' => 'Titulo do Anúncio', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label> Descrição Curta</label>
        <?= $this->Form->control('descricao', ['class' => 'form-control', 'placeholder' => 'Descrição do Anúncio - Resumo do anúncio', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label> Conteúdo</label>
        <?= $this->Form->control('conteudo', ['class' => 'form-control', 'placeholder' => 'Conteúdo do Anúncio', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Slug</label>
        <?= $this->Form->control('slug', ['class' => 'form-control', 'placeholder' => 'Titulo do Anúncio na URL', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Palavra Chave</label>
        <?= $this->Form->control('keywords', ['class' => 'form-control', 'placeholder' => 'Principais palavras do anúncio para os buscadores', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Resumo do Anúncio</label>
        <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Resumo do anúncio - Máximo 180 caracteres', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label> Situação</label>
        <?= $this->Form->control('anuncios_situation_id', ['options' => $anunciosSituations, 'class' => 'form-control', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label> Categoria do Anúncio</label>
        <?= $this->Form->control('cats_anuncio_id', ['options' => $catsAnuncios, 'class' => 'form-control', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>