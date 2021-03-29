<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Carousel</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($carousel, ['enctype' => 'multipart/form-data']) ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Nome</label>
        <?= $this->Form->control('nome_carousel', ['class' => 'form-control', 'placeholder' => 'Nome do carousel', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label> Titulo</label>
        <?= $this->Form->control('titulo', ['class' => 'form-control', 'placeholder' => 'Titulo do carousel', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label> Descrição</label>
        <?= $this->Form->control('descricao', ['class' => 'form-control', 'placeholder' => 'Descrição do carousel', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label> Titulo do Botão</label>
        <?= $this->Form->control('titulo_botao', ['class' => 'form-control', 'placeholder' => 'Titulo do Botão', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-4">
        <label> Link do Botão</label>
        <?= $this->Form->control('link', ['class' => 'form-control', 'placeholder' => 'Link do Botão', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-4">
        <label> Cor do Botão</label>
        <?= $this->Form->control('color_id', ['options' => $colors, 'empty' => true, 'class' => 'form-control', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Posição do Texto</label>
        <?= $this->Form->control('position_id', ['options' => $positions, 'class' => 'form-control', 'label' => false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Situação do Carousel</label>
        <?= $this->Form->control('situation_id', ['options' => $situations, 'class' => 'form-control', 'label' => false]) ?>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Foto (1920x846)</label>
        <?= $this->Form->control('imagem', ['type' => 'file', 'label' => false, 'onchange' => 'previewImagem()']) ?>
    </div>

    <div class="form-group col-md-6">
        <?php
        $imagem_antiga = '../../files/carousel/preview_img.jpg';
        ?>

        <img src='<?= $imagem_antiga ?>' alt='Preview da Imagem' id='preview-img' class='img-thumbnail' style="width: 250px; height: 120px;">
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-success']) ?>
<?= $this->Form->end() ?>