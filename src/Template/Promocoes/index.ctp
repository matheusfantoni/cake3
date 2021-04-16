<main role="main">
    <div class="jumbotron cat-home">
        <div class="container">
            <h1 class="display-4 text-center titulo-cat-home">Promoções</h1>
            <div class="row">

                <?php foreach ($promocoes as $promocao) { ?>

                    <div class="col-12 col-sm-6 col-md-4 cat-dest">
                        <div class="card shadow">
                            <div class="card-body text-center img-promo">
                                <a href="anuncios.html">
                                    <!--<img src="imagens/propag_lat_esq.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">-->
                                    <?php
                                    $imagem = $this->Html->image(
                                        '../files/promocao/'
                                            . $promocao->id . '/' . $promocao->imagem,
                                        ['class' => 'bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto']
                                    );

                                    echo $this->Html->link(
                                        __($imagem),
                                        [
                                            'controller' => 'VerPromocao',
                                            'action' => 'index',
                                            $promocao->slug
                                        ],
                                        ['escape' => false]
                                    );
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</main>