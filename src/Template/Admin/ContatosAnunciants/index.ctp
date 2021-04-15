<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Listar Contato com Anunciante</h2>
    </div>
    <!--<div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'ContatosAnunciants', 'action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']);
        ?>
    </div>-->
</div>
<?= $this->Flash->render() ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="d-none d-lg-table-cell">E-mail</th>
                <th class="d-none d-sm-table-cell">Anunciante</th>
                <th class="d-none d-sm-table-cell">Anúncio</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatosAnunciants as $contatosAnunciant) : ?>
                <tr>
                    <td><?= $this->Number->format($contatosAnunciant->id) ?></td>
                    <td><?= h($contatosAnunciant->nome) ?></td>
                    <td class="d-none d-sm-table-cell">
                        <?= h($contatosAnunciant->email) ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?= $contatosAnunciant->has('anunciant') ? $this->Html->link($contatosAnunciant->anunciant->nome, ['controller' => 'Anunciants', 'action' => 'view', $contatosAnunciant->anunciant->id]) : '' ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?= $contatosAnunciant->has('anuncio') ? $this->Html->link($contatosAnunciant->anuncio->titulo, ['controller' => 'Anuncios', 'action' => 'view', $contatosAnunciant->anuncio->id]) : '' ?>
                    </td>
                    <td>
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'ContatosAnunciants', 'action' => 'view', $contatosAnunciant->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosAnunciants', 'action' => 'delete', $contatosAnunciant->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar o contato com anúnciante # {0}?', $contatosAnunciant->id)]) ?>
                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'ContatosAnunciants', 'action' => 'view', $contatosAnunciant->id], ['class' => 'dropdown-item']) ?>

                                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'ContatosAnunciants', 'action' => 'delete', $contatosAnunciant->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar o contato com anúnciante # {0}?', $contatosAnunciant->id)]) ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('pagination'); ?>
</div>