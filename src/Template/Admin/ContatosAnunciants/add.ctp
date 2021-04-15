<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContatosAnunciant $contatosAnunciant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contatos Anunciants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Anuncios'), ['controller' => 'Anuncios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anuncio'), ['controller' => 'Anuncios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Anunciants'), ['controller' => 'Anunciants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Anunciant'), ['controller' => 'Anunciants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contatosAnunciants form large-9 medium-8 columns content">
    <?= $this->Form->create($contatosAnunciant) ?>
    <fieldset>
        <legend><?= __('Add Contatos Anunciant') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
            echo $this->Form->control('mensagem');
            echo $this->Form->control('anuncio_id', ['options' => $anuncios]);
            echo $this->Form->control('anunciant_id', ['options' => $anunciants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
