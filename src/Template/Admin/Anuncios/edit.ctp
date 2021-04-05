<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anuncio $anuncio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $anuncio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $anuncio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Anuncios'), ['action' => 'index']) ?></li>
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
<div class="anuncios form large-9 medium-8 columns content">
    <?= $this->Form->create($anuncio) ?>
    <fieldset>
        <legend><?= __('Edit Anuncio') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('conteudo');
            echo $this->Form->control('imagem');
            echo $this->Form->control('slug');
            echo $this->Form->control('keywords');
            echo $this->Form->control('description');
            echo $this->Form->control('qnt_acesso');
            echo $this->Form->control('robot_id', ['options' => $robots]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('anuncios_situation_id', ['options' => $anunciosSituations]);
            echo $this->Form->control('cats_anuncio_id', ['options' => $catsAnuncios]);
            echo $this->Form->control('situations._ids', ['options' => $situations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
