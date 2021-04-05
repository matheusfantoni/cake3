<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anuncio $anuncio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Anuncio'), ['action' => 'edit', $anuncio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Anuncio'), ['action' => 'delete', $anuncio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anuncio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Anuncios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Anuncio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Robots'), ['controller' => 'Robots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Robot'), ['controller' => 'Robots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Anuncios Situations'), ['controller' => 'AnunciosSituations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Anuncios Situation'), ['controller' => 'AnunciosSituations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats Anuncios'), ['controller' => 'CatsAnuncios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cats Anuncio'), ['controller' => 'CatsAnuncios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="anuncios view large-9 medium-8 columns content">
    <h3><?= h($anuncio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($anuncio->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($anuncio->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($anuncio->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Keywords') ?></th>
            <td><?= h($anuncio->keywords) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($anuncio->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Robot') ?></th>
            <td><?= $anuncio->has('robot') ? $this->Html->link($anuncio->robot->id, ['controller' => 'Robots', 'action' => 'view', $anuncio->robot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $anuncio->has('user') ? $this->Html->link($anuncio->user->name, ['controller' => 'Users', 'action' => 'view', $anuncio->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anuncios Situation') ?></th>
            <td><?= $anuncio->has('anuncios_situation') ? $this->Html->link($anuncio->anuncios_situation->id, ['controller' => 'AnunciosSituations', 'action' => 'view', $anuncio->anuncios_situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cats Anuncio') ?></th>
            <td><?= $anuncio->has('cats_anuncio') ? $this->Html->link($anuncio->cats_anuncio->id, ['controller' => 'CatsAnuncios', 'action' => 'view', $anuncio->cats_anuncio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($anuncio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qnt Acesso') ?></th>
            <td><?= $this->Number->format($anuncio->qnt_acesso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($anuncio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($anuncio->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($anuncio->descricao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Conteudo') ?></h4>
        <?= $this->Text->autoParagraph(h($anuncio->conteudo)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Situations') ?></h4>
        <?php if (!empty($anuncio->situations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Situacao') ?></th>
                <th scope="col"><?= __('Color Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($anuncio->situations as $situations): ?>
            <tr>
                <td><?= h($situations->id) ?></td>
                <td><?= h($situations->nome_situacao) ?></td>
                <td><?= h($situations->color_id) ?></td>
                <td><?= h($situations->created) ?></td>
                <td><?= h($situations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Situations', 'action' => 'view', $situations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Situations', 'action' => 'edit', $situations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Situations', 'action' => 'delete', $situations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $situations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
