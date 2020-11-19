<div class="users form large-12 medium-12 columns content">
    <h1>Cadastrar Usuário</h1>

    <?php
    echo $this->Form->create($user);
    echo $this->Form->control('name');
    echo $this->Form->control('email');
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();

    ?>

</div>