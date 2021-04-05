<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnunciosSituation[]|\Cake\Collection\CollectionInterface $anunciosSituations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Anuncios Situation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Anuncios'), ['controller' => 'Anuncios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anuncio'), ['controller' => 'Anuncios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anunciosSituations index large-9 medium-8 columns content">
    <h3><?= __('Anuncios Situations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_situacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anunciosSituations as $anunciosSituation): ?>
            <tr>
                <td><?= $this->Number->format($anunciosSituation->id) ?></td>
                <td><?= h($anunciosSituation->nome_situacao) ?></td>
                <td><?= $anunciosSituation->has('color') ? $this->Html->link($anunciosSituation->color->nome_cor, ['controller' => 'Colors', 'action' => 'view', $anunciosSituation->color->id]) : '' ?></td>
                <td><?= h($anunciosSituation->created) ?></td>
                <td><?= h($anunciosSituation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $anunciosSituation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anunciosSituation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anunciosSituation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anunciosSituation->id)]) ?>
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
