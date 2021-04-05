<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anuncio[]|\Cake\Collection\CollectionInterface $anuncios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Anuncio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Robots'), ['controller' => 'Robots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Robot'), ['controller' => 'Robots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Anuncios Situations'), ['controller' => 'AnunciosSituations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anuncios Situation'), ['controller' => 'AnunciosSituations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats Anuncios'), ['controller' => 'CatsAnuncios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cats Anuncio'), ['controller' => 'CatsAnuncios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anuncios index large-9 medium-8 columns content">
    <h3><?= __('Anuncios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keywords') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qnt_acesso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('robot_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anuncios_situation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cats_anuncio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuncios as $anuncio): ?>
            <tr>
                <td><?= $this->Number->format($anuncio->id) ?></td>
                <td><?= h($anuncio->titulo) ?></td>
                <td><?= h($anuncio->imagem) ?></td>
                <td><?= h($anuncio->slug) ?></td>
                <td><?= h($anuncio->keywords) ?></td>
                <td><?= h($anuncio->description) ?></td>
                <td><?= $this->Number->format($anuncio->qnt_acesso) ?></td>
                <td><?= $anuncio->has('robot') ? $this->Html->link($anuncio->robot->id, ['controller' => 'Robots', 'action' => 'view', $anuncio->robot->id]) : '' ?></td>
                <td><?= $anuncio->has('user') ? $this->Html->link($anuncio->user->name, ['controller' => 'Users', 'action' => 'view', $anuncio->user->id]) : '' ?></td>
                <td><?= $anuncio->has('anuncios_situation') ? $this->Html->link($anuncio->anuncios_situation->id, ['controller' => 'AnunciosSituations', 'action' => 'view', $anuncio->anuncios_situation->id]) : '' ?></td>
                <td><?= $anuncio->has('cats_anuncio') ? $this->Html->link($anuncio->cats_anuncio->id, ['controller' => 'CatsAnuncios', 'action' => 'view', $anuncio->cats_anuncio->id]) : '' ?></td>
                <td><?= h($anuncio->created) ?></td>
                <td><?= h($anuncio->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $anuncio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anuncio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anuncio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anuncio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
