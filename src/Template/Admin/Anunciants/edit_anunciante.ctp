<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Informações do Anunciante</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">

            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Anunciants', 'action' => 'viewAnunciante'], ['class' => 'btn btn-outline-primary btn-sm']) ?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Anunciants', 'action' => 'viewAnunciante'], ['class' => 'dropdown-item']) ?>

            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($anunciant) ?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Nome</label>
        <?= $this->Form->control('nome', ['class' => 'form-control', 'placeholder' => 'Nome do Anunciante', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Descrição Curta</label>
        <?= $this->Form->control('descricao', ['class' => 'form-control', 'placeholder' => 'Descrição do Anunciante - Resumo do anúncio', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Slug</label>
        <?= $this->Form->control('slug', ['class' => 'form-control', 'placeholder' => 'Titulo do Anúncio na URL', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Palavra Chave</label>
        <?= $this->Form->control('keywords', ['class' => 'form-control', 'placeholder' => 'Principais palavras do anunciante para os buscadores', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">*</span> Resumo do Anunciante</label>
        <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Resumo do anunciante - Máximo 180 caracteres', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label> Telefone</label>
        <?= $this->Form->control('telefone', ['class' => 'form-control', 'placeholder' => 'Telefone de contato', 'label' => false, 'onkeypress' => "$(this).mask('(00) 0000-00009')"]) ?>
    </div>
    <div class="form-group col-md-6">
        <label> Celular</label>
        <?= $this->Form->control('celular', ['class' => 'form-control', 'placeholder' => 'Celular de contato', 'label' => false, 'onkeypress' => "$(this).mask('(00) 0000-00009')"]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label> E-mail</label>
        <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail de contato', 'label' => false]) ?>
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>