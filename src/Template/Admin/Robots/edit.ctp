<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Robot $robot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $robot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $robot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Robots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Anuncios'), ['controller' => 'Anuncios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anuncio'), ['controller' => 'Anuncios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="robots form large-9 medium-8 columns content">
    <?= $this->Form->create($robot) ?>
    <fieldset>
        <legend><?= __('Edit Robot') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
