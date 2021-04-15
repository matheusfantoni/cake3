<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Imagem do Anunciante</h2>
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

<?= $this->Form->create($anunciant, ['enctype' => 'multipart/form-data']) ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Foto (500x400)</label>
        <?= $this->Form->control('imagem', ['type' => 'file', 'label' => false, 'onchange' => 'previewImagem()']) ?>
    </div>

    <div class="form-group col-md-6">
        <?php
        if (($anunciant->imagem !== null) or (!empty($anunciant->imagem))) {
            $imagem_antiga = '../../../files/anunciant/' . $anunciant->id . '/' . $anunciant->imagem;
        } else {
            $imagem_antiga = '../../files/anunciant/preview_img.jpg';
        }
        ?>

        <img src='<?= $imagem_antiga ?>' alt='<?= $anunciant->name ?>' id='preview-img' class='img-thumbnail' style="width: 250px; height: 200px;">
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>