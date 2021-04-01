<main>
    <div class="jumbotron cat-home">
        <div class="container">
            <h1 class="display-4 text-center titulo-cat-home">Categorias de Anúncios</h1>
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
</main>