<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnunciosSituation $anunciosSituation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $anunciosSituation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $anunciosSituation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Anuncios Situations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Anuncios'), ['controller' => 'Anuncios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anuncio'), ['controller' => 'Anuncios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anunciosSituations form large-9 medium-8 columns content">
    <?= $this->Form->create($anunciosSituation) ?>
    <fieldset>
        <legend><?= __('Edit Anuncios Situation') ?></legend>
        <?php
            echo $this->Form->control('nome_situacao');
            echo $this->Form->control('color_id', ['options' => $colors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
