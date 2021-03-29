<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Color $color
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Color'), ['action' => 'edit', $color->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Color'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # {0}?', $color->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carousels'), ['controller' => 'Carousels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carousel'), ['controller' => 'Carousels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colors view large-9 medium-8 columns content">
    <h3><?= h($color->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Cor') ?></th>
            <td><?= h($color->nome_cor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cor') ?></th>
            <td><?= h($color->cor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($color->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($color->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($color->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Carousels') ?></h4>
        <?php if (!empty($color->carousels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Carousel') ?></th>
                <th scope="col"><?= __('Imagem') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Titulo Botao') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Ordem') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Color Id') ?></th>
                <th scope="col"><?= __('Situation Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($color->carousels as $carousels): ?>
            <tr>
                <td><?= h($carousels->id) ?></td>
                <td><?= h($carousels->nome_carousel) ?></td>
                <td><?= h($carousels->imagem) ?></td>
                <td><?= h($carousels->titulo) ?></td>
                <td><?= h($carousels->descricao) ?></td>
                <td><?= h($carousels->titulo_botao) ?></td>
                <td><?= h($carousels->link) ?></td>
                <td><?= h($carousels->ordem) ?></td>
                <td><?= h($carousels->position_id) ?></td>
                <td><?= h($carousels->color_id) ?></td>
                <td><?= h($carousels->situation_id) ?></td>
                <td><?= h($carousels->created) ?></td>
                <td><?= h($carousels->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Carousels', 'action' => 'view', $carousels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Carousels', 'action' => 'edit', $carousels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carousels', 'action' => 'delete', $carousels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carousels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Situations') ?></h4>
        <?php if (!empty($color->situations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Situacao') ?></th>
                <th scope="col"><?= __('Color Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($color->situations as $situations): ?>
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
