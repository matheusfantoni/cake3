<?php

$cakeDescription = 'SDAU - Login Administrativo';
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

    <?= $this->Html->css(['bootstrap.min', 'signin']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="text-center">

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <?= $this->Html->script(['jquery-3.5.1.min', 'bootstrap.min']) ?>
</body>

</html>