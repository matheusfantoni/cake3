<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anunciant $anunciant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Anunciant'), ['action' => 'edit', $anunciant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Anunciant'), ['action' => 'delete', $anunciant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anunciant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Anunciants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Anunciant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="anunciants view large-9 medium-8 columns content">
    <h3><?= h($anunciant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($anunciant->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($anunciant->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($anunciant->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($anunciant->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Keywords') ?></th>
            <td><?= h($anunciant->keywords) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($anunciant->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($anunciant->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($anunciant->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($anunciant->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $anunciant->has('user') ? $this->Html->link($anunciant->user->name, ['controller' => 'Users', 'action' => 'view', $anunciant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($anunciant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qnt Acesso') ?></th>
            <td><?= $this->Number->format($anunciant->qnt_acesso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($anunciant->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($anunciant->modified) ?></td>
        </tr>
    </table>
</div>
