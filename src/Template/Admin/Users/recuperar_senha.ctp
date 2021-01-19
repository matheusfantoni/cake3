<?= $this->Form->create($user, ['class' => 'form-signin']) ?>


<h1 class="h3 mb-3 font-weight-normal">Recuperar Senha do Usuário</h1>

<?= $this->Flash->render(); ?>
<br>


<div class="form-group">
    <label>E-mail</label>
    <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Digite o email cadastrado', 'label' => false]) ?>
</div>


<?= $this->Form->button(_('Recuperar'), ['class' => 'btn btn-lg btn-warning btn-block']) ?>

<br>
<p class="text-center">
    <?= $this->Html->link(__('Clique aqui para Acessar'), ['controller' => 'Users', 'action' => 'login']) ?>

</p>

<?= $this->Form->end(); ?>