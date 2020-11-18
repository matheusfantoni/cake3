<h1>Editar Usuário</h1>

<?php
echo $this->Form->create($user);
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('username');
echo $this->Form->control('password');
echo $this->Form->button('Editar');
echo $this->Form->end();
?>

