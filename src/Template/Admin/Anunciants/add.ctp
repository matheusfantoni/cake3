<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anunciant $anunciant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Anunciants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anunciants form large-9 medium-8 columns content">
    <?= $this->Form->create($anunciant) ?>
    <fieldset>
        <legend><?= __('Add Anunciant') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
            echo $this->Form->control('imagem');
            echo $this->Form->control('slug');
            echo $this->Form->control('keywords');
            echo $this->Form->control('description');
            echo $this->Form->control('qnt_acesso');
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('email');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
