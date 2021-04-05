<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Robot $robot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Robot'), ['action' => 'edit', $robot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Robot'), ['action' => 'delete', $robot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $robot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Robots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Robot'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Anuncios'), ['controller' => 'Anuncios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Anuncio'), ['controller' => 'Anuncios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="robots view large-9 medium-8 columns content">
    <h3><?= h($robot->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($robot->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($robot->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($robot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($robot->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($robot->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Anuncios') ?></h4>
        <?php if (!empty($robot->anuncios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Conteudo') ?></th>
                <th scope="col"><?= __('Imagem') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Keywords') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Qnt Acesso') ?></th>
                <th scope="col"><?= __('Robot Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Anuncios Situation Id') ?></th>
                <th scope="col"><?= __('Cats Anuncio Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($robot->anuncios as $anuncios): ?>
            <tr>
                <td><?= h($anuncios->id) ?></td>
                <td><?= h($anuncios->titulo) ?></td>
                <td><?= h($anuncios->descricao) ?></td>
                <td><?= h($anuncios->conteudo) ?></td>
                <td><?= h($anuncios->imagem) ?></td>
                <td><?= h($anuncios->slug) ?></td>
                <td><?= h($anuncios->keywords) ?></td>
                <td><?= h($anuncios->description) ?></td>
                <td><?= h($anuncios->qnt_acesso) ?></td>
                <td><?= h($anuncios->robot_id) ?></td>
                <td><?= h($anuncios->user_id) ?></td>
                <td><?= h($anuncios->anuncios_situation_id) ?></td>
                <td><?= h($anuncios->cats_anuncio_id) ?></td>
                <td><?= h($anuncios->created) ?></td>
                <td><?= h($anuncios->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Anuncios', 'action' => 'view', $anuncios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Anuncios', 'action' => 'edit', $anuncios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Anuncios', 'action' => 'delete', $anuncios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anuncios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
