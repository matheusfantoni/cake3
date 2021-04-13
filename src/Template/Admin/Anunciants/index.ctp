<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anunciant[]|\Cake\Collection\CollectionInterface $anunciants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Anunciant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anunciants index large-9 medium-8 columns content">
    <h3><?= __('Anunciants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keywords') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qnt_acesso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anunciants as $anunciant): ?>
            <tr>
                <td><?= $this->Number->format($anunciant->id) ?></td>
                <td><?= h($anunciant->nome) ?></td>
                <td><?= h($anunciant->descricao) ?></td>
                <td><?= h($anunciant->imagem) ?></td>
                <td><?= h($anunciant->slug) ?></td>
                <td><?= h($anunciant->keywords) ?></td>
                <td><?= h($anunciant->description) ?></td>
                <td><?= $this->Number->format($anunciant->qnt_acesso) ?></td>
                <td><?= h($anunciant->telefone) ?></td>
                <td><?= h($anunciant->celular) ?></td>
                <td><?= h($anunciant->email) ?></td>
                <td><?= $anunciant->has('user') ? $this->Html->link($anunciant->user->name, ['controller' => 'Users', 'action' => 'view', $anunciant->user->id]) : '' ?></td>
                <td><?= h($anunciant->created) ?></td>
                <td><?= h($anunciant->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $anunciant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anunciant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anunciant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anunciant->id)]) ?>
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
