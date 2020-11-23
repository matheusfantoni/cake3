<?php

$cakeDescription = 'Administrativo';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min']) ?>
    <?= $this->Html->css(['fontawesome-all.min', 'dashboard']) ?>
    <?= $this->Html->script(['fontawesome-all.min']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <a class="sidebar-toggle text-light mr-3">
            <span class="navbar-toggler-icon"></span>
        </a>
        <a class="navbar-brand" href="#">Celke</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <img class="rounded-circle" src="imagem/icon.png" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">Usuário</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <nav class="sidebar">
            <ul class="list-unstyled">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li>
                    <a href="#submenu1" data-toggle="collapse">
                        <i class="fas fa-user"></i> Usuário
                    </a>
                    <ul id="submenu1" class="list-unstyled collapse">
                        <li><a href="listar.html"><i class="fas fa-users"></i> Usuários</a></li>
                        <li><a href="#"><i class="fas fa-key"></i> Nível de Acesso</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu2" data-toggle="collapse"><i class="fas fa-list-ul"></i> Menu</a>
                    <ul id="submenu2" class="list-unstyled collapse">
                        <li><a href="#"><i class="fas fa-file-alt"></i> Páginas</a></li>
                        <li><a href="#"><i class="fab fa-elementor"></i> Item de Menu</a></li>
                    </ul>

                </li>
                <li><a href="#"> Item 1</a></li>
                <li><a href="#"> Item 2</a></li>
                <li><a href="#"> Item 3</a></li>
                <li class="active"><a href="#"> Item 4</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
        </nav>

        <div class="content p-1">
            <div class="list-group-item">
                
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>



    <?= $this->Html->script(['jquery-3.5.1.min', 'popper.min', 'bootstrap.min', 'dashboard']) ?>
</body>

</html>