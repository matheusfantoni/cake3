<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Categoria de Anúncio</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'CatsAnuncios', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

            <?= $this->Html->link(__('Visualizar'), ['controller' => 'CatsAnuncios', 'action' => 'view', $catsAnuncio->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Relamente deseja apagar a categoria de anúncio # {0}?', $catsAnuncio->id)]) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'CatsAnuncios', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'CatsAnuncios', 'action' => 'view', $catsAnuncio->id], ['class' => 'dropdown-item']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'CatsAnuncios', 'action' => 'delete', $catsAnuncio->id], ['class' => 'dropdown-item', 'confirm' => __('Relamente deseja apagar a categoria de anúncio # {0}?', $catsAnuncio->id)]) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($catsAnuncio) ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Nome</label>
        <?= $this->Form->control('nome', ['class' => 'form-control', 'placeholder' => 'Nome da Categoria', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Ícone</label>
        <?= $this->Form->control('icone', ['class' => 'form-control', 'placeholder' => 'Nome do Ícone', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Situação</label>
        <?= $this->Form->control('situation_id', ['options' => $situations, 'class' => 'form-control', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>