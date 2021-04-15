<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'pers_guia_bairro']) ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<?= $this->element('menu_guia_bairro') ?>
<?= $this->fetch('content') ?>
<?= $this->element('rodape_guia_bairro') ?>

<?= $this->Html->script(['jquery-3.5.1.min', 'popper.min', 'bootstrap.min', 'jquery.mask.min']) ?>
</body>

</html>