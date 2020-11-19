<div class="users form large-12 medium-12 columns content">
    <h1>Login</h1>
    <?= $this->Form->create() ?>
    <fieldset>

        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(_('Acessar')) ?>
    <?= $this->Form->end(); ?>

</div>