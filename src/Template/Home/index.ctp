<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $cont_marc = 0;
            foreach ($carousels as $carousel) {
                if ($cont_marc == 0) {
                    echo '<li data-target="#myCarousel" data-slide-to="' . $cont_marc . '" class="active"></li>';
                } else {
                    echo '<li data-target="#myCarousel" data-slide-to="' . $cont_marc . '"></li>';
                }
                $cont_marc++;
            }
            ?>


        </ol>
        <div class="carousel-inner">

            <?php
            $cont_slide = 0;
            foreach ($carousels as $carousel) {
                if ($cont_slide == 0) {
                    echo '<div class="carousel-item active">';
                } else {
                    echo '<div class="carousel-item">';
                }

                echo $this->Html->image('../files/carousel/' . $carousel->id . '/' . $carousel->imagem, ['class' => 'first-slide img-fluid', 'alt' => 'Slide um']);


                echo '<div class="container">';
                echo '<div class="carousel-caption ' . $carousel->position->posicao . '">';
                if ($carousel->titulo != "") {
                    echo '<h1 class="d-none d-md-block">' . $carousel->titulo . '</h1>';
                }

                if ($carousel->descricao != "") {
                    echo '<p class="d-none d-md-block">' . $carousel->descricao . '</p>';
                }

                if (($carousel->titulo_botao != "") and ($carousel->link != "") and ($carousel->color->cor != "")) {
                    echo '<p><a class="btn btn-lg btn-' . $carousel->color->cor . '" href="' . $carousel->link . '" role="button">' . $carousel->titulo_botao . '</a></p>';
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
                $cont_slide++;
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron cat-home">
        <div class="container">
            <h1 class="display-4 text-center titulo-cat-home">Categorias em Destaque</h1>
            <div class="row">
                <?php
                foreach ($catAnuncios as $catAnuncio) {
                    echo '<div class="col-12 col-sm-6 col-md-3 cat-dest">';
                    echo '<div class="card shadow">';
                    echo ' <div class="card-body text-center">';
                    $texto_link =  '<div class="tamanho-icone"> <i class="' . $catAnuncio->icone . '"></i>
                                            </div> <h5>' . $catAnuncio->nome . '</h5>';
                    echo $this->Html->link(
                        __($texto_link),
                        [
                            'controller' => 'CategoriasAnuncios',
                            'action' => 'index'
                        ],
                        [
                            'escape' => false
                        ]
                    );

                    echo ' </div>';
                    echo ' </div>';
                    echo ' </div>';
                }

                echo '<div class="col-12 col-sm-6 col-md-3 cat-dest">';
                echo '<div class="card shadow">';
                echo ' <div class="card-body text-center">';
                $texto_link =  '<div class="tamanho-icone"> <i class="fas fa-ellipsis-h"></i>
                                            </div> <h5>Mais Categorias<h5>';
                echo $this->Html->link(
                    __($texto_link),
                    [
                        'controller' => 'CategoriasAnuncios',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                );

                echo ' </div>';
                echo ' </div>';
                echo ' </div>';

                ?>
            </div>
        </div>
    </div>


    <div class="jumbotron propag-dest">
        <div class="row m-0">
            <div class="col-sm-12 col-md-6 p-0">
                <img class="img-fluid" src="imagens/propag_lat_esq.png">
            </div>
            <div class="col-sm-12 col-md-6 propag-dest-text p-4">
                <h2 class="display-4">Propaganda destaque</h2>
                <p class="lead">Praesent in tellus lorem. Praesent vehicula ut est ut imperdiet. Maecenas sed finibus
                    neque, id pulvinar turpis.</p>
            </div>
        </div>
    </div>

    <div class="jumbotron anunc-dest">
        <div class="container">
            <h1 class="display-4 text-center titulo-anunc-dest">Anúncios em Destaque</h1>
            <div class="card-deck">
                <div class="col-12 col-sm-6 col-md-3 p-0">
                    <div class="card shadow mr-1 ml-1">
                        <a href="#">
                            <img src="imagens/empresa1.jpg" class="card-img-top aument-transi" alt="Anuncio 1">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title text-center">Anúncio um</h5>
                            </a>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to additional content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 p-0">
                    <div class="card shadow mr-1 ml-1">
                        <a href="#">
                            <img src="imagens/empresa1.jpg" class="card-img-top aument-transi" alt="Anuncio 2">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title text-center">Anúncio dois</h5>
                            </a>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 p-0">
                    <div class="card shadow mr-1 ml-1">
                        <a href="#">
                            <img src="imagens/empresa1.jpg" class="card-img-top aument-transi" alt="Anuncio 3">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title text-center">Anúncio três</h5>
                            </a>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 p-0">
                    <div class="card shadow mr-1 ml-1">
                        <a href="#">
                            <img src="imagens/empresa1.jpg" class="card-img-top aument-transi" alt="Anuncio 4">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title text-center">Anúncio quatro</h5>
                            </a>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>