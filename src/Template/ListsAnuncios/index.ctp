<main role="main">
    <div class="jumbotron blog">
        <div class="container">
            <h1 class="display-4 text-center titulo-cat-home">Anúncios</h1>
            <div class="row">
                <div class="col-md-8">

                    <?php foreach ($anuncios as $anuncio) { ?>
                        <div class="row featurette shadow bg-white p-1 mb-3">
                            <div class="col-md-7 order-md-2">
                                <div class="anunc-title">
                                    <h2 class="featurette-heading">
                                        <?= $this->Html->link(__($anuncio->titulo), ['controller' => 'Anuncio', 'action' => 'view', $anuncio->slug]) ?>
                                    </h2>
                                </div>
                                <p class="lead"><?= $anuncio->descricao ?></p>
                            </div>
                            <div class="col-md-5 order-md-1">
                                <a href="#">
                                    <?php
                                    $imagem = $this->Html->image('../files/anuncio/' . $anuncio->id . '/' . $anuncio->imagem, ['class' => 'bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto']);

                                    echo $this->Html->link(__($imagem), ['controller' => 'Anuncio', 'action' => 'view', $anuncio->slug], ['escape' => false]);

                                    ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                    <?= $this->element('pagination_bairro'); ?>


                </div>

                <aside class="col-md-4">
                    <div class="card shadow p-0 mb-3 bg-white">
                        <div class="card-header">
                            Anúncios Destaques
                        </div>
                        <div class="p-3">
                            <li class="media mb-2">
                                <a href="#">
                                    <img src="imagens/empresa1.jpg" width="64" height="64" class="mr-3" alt="...">
                                </a>
                                <div class="media-body anunc-title">
                                    <a href="#">
                                        Oh yeah, it’s that good.
                                    </a>
                                </div>
                            </li>

                            <li class="media mb-2">
                                <a href="#">
                                    <img src="imagens/empresa1.jpg" width="64" height="64" class="mr-3" alt="...">
                                </a>
                                <div class="media-body anunc-title">
                                    <a href="#">
                                        Oh yeah, it’s that good.
                                    </a>
                                </div>
                            </li>

                            <li class="media mb-2">
                                <a href="#">
                                    <img src="imagens/empresa1.jpg" width="64" height="64" class="mr-3" alt="...">
                                </a>
                                <div class="media-body anunc-title">
                                    <a href="#">
                                        Oh yeah, it’s that good.
                                    </a>
                                </div>
                            </li>

                            <li class="media mb-2">
                                <a href="#">
                                    <img src="imagens/empresa1.jpg" width="64" height="64" class="mr-3" alt="...">
                                </a>
                                <div class="media-body anunc-title">
                                    <a href="#">
                                        Oh yeah, it’s that good.
                                    </a>
                                </div>
                            </li>

                            <li class="media mb-2">
                                <a href="#">
                                    <img src="imagens/empresa1.jpg" width="64" height="64" class="mr-3" alt="...">
                                </a>
                                <div class="media-body anunc-title">
                                    <a href="#">
                                        Oh yeah, it’s that good.
                                    </a>
                                </div>
                            </li>

                        </div>
                    </div>

                    <div class="card shadow p-0 mb-3 bg-white">
                        <div class="card-header">
                            Últimos Anúncios
                        </div>
                        <div class="p-3">

                            <?php
                            foreach ($anunciosUltimos as $anunciosUltimo) { ?>
                                <li class="media mb-2">
                                    <a href="#">
                                        
                                        <?php

                                        $imagem = $this->Html->image(
                                            '../files/anuncio/' .
                                                $anunciosUltimo->id . '/' . $anunciosUltimo->imagem,
                                            ['class' => 'mr-3', 'width' => '64', 'height' => '64']
                                        );

                                        echo $this->Html->link(__($imagem), [
                                            'controller' => 'Anuncio',
                                            'action' => 'view', $anunciosUltimo->slug
                                        ], ['escape' => false]);

                                        ?>

                                    </a>
                                    <div class="media-body anunc-title">

                                        <?= $this->Html->link(__($anunciosUltimo->titulo), [
                                            'controller' => 'Anuncio',
                                            'action' => 'view', $anunciosUltimo->slug
                                        ]); ?>

                                    </div>
                                </li>

                            <?php } ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

</main>