<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Situação nos Buscadores</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Robots', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Listar'), ['controller' => 'Robots', 'action' => 'index'], ['class' => 'dropdown-item']) ?>                                  
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($robot) ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Nome</label>
        <?= $this->Form->control('nome', ['class' => 'form-control', 'placeholder' => 'Nome da situação nos buscadores', 'label' => false]) ?>
    </div> 
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Tipo</label>
        <?= $this->Form->control('tipo', ['class' => 'form-control', 'placeholder' => 'Tipo da situação nos buscadores', 'label' => false]) ?>      
    </div> 
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-success']) ?>
<?= $this->Form->end() ?>