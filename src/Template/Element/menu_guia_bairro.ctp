<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #25233b;">
        <div class="container">
            <!--<a class="navbar-brand" href="index.html">Celke</a>-->
            <?php $imagem = $this->Html->image('../files/logo/logo.png', ['class' => 'logo', 'alt' => 'logo']);

            echo $this->Html->link(
                __($imagem),
                [
                    'controller' => 'Home',
                    'action' => 'index'
                ],
                [
                    'class' => 'navbar-brand',
                    'escape' => false
                ]
            );
            ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample07">
                <ul class="navbar-nav">
                    <li class="nav-item menu">
                        <?= $this->Html->link(
                            __('Home'),
                            ['controller' => 'Home', 'action' => 'index'],
                            ['class' => 'nav-link']
                        ) ?>

                    </li>
                    <li class="nav-item menu">
                        <?= $this->Html->link(
                            __('Categorias'),
                            ['controller' => 'Categorias', 'action' => 'index'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                    <li class="nav-item menu">
                        <?= $this->Html->link(
                            __('Promoções'),
                            ['controller' => 'Promocoes', 'action' => 'index'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                    <li class="nav-item menu">
                        <?= $this->Html->link(
                            __('Contato'),
                            ['controller' => 'Contato', 'action' => 'index'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>