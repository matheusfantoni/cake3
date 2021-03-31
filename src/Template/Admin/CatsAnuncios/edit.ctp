<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatsAnuncio $catsAnuncio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catsAnuncio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catsAnuncio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cats Anuncios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catsAnuncios form large-9 medium-8 columns content">
    <?= $this->Form->create($catsAnuncio) ?>
    <fieldset>
        <legend><?= __('Edit Cats Anuncio') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('icone');
            echo $this->Form->control('ordem');
            echo $this->Form->control('destaque_home');
            echo $this->Form->control('slug');
            echo $this->Form->control('situation_id', ['options' => $situations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
