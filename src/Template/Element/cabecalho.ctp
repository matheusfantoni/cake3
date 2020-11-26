<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="#">Celke</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <?php if (!empty($perfilUser['imagem'])) { ?>
                        <?= $this->Html->image('../files/user/' . $perfilUser['id'] . '/' . $perfilUser['imagem'], ['class' => 'rounded-circle', 'width' => '20', 'height' => '20']) ?>&nbsp;
                    <?php } else { ?>
                        <?= $this->Html->image('../files/user/icone_usuario.png', ['class' => 'rounded-circle', 'width' => '20', 'height' => '20']) ?>&nbsp;
                    <?php } ?>
                    <span class="d-none d-sm-inline">
                        <?= current(str_word_count($perfilUser['name'], 2)); ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>