    <main role="main">
        <div class="jumbotron blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php if ($anuncio) {  ?>
                            <div class="blog-post">
                                <h2 class="blog-post-title"><?= $anuncio->titulo ?></h2>
                                <?php
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

                                date_default_timezone_set('America/Sao_Paulo');
                                $data = date_format($anuncio->created, 'Y-m-d H:i:s');

                                echo "<p class='blog-post-meta'>Inserido em: " . strftime('%e de %B às %H:%M', strtotime($data)) . "</p>";
                                ?>

                                <div id="myCarousel" class="carousel slide mb-4" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="imagens/foto.jpg" class="bd-placeholder-img img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="imagens/foto.jpg" class="bd-placeholder-img img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="imagens/foto.jpg" class="bd-placeholder-img img-fluid">
                                        </div>
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

                                <?= $anuncio->conteudo ?>
                            </div>
                        <?php } ?>
                    </div>


                    <aside class="col-md-4">
                        <div class="card p-0 mb-3 bg-white">
                            <div class="card-header">
                                Contatar o anunciante
                            </div>
                            <div class="p-3">
                                <p class="lead">Ao ligar, diga que você viu esse anúncio no ...</p>
                                (41) 98861-0440<br>
                                (41) 98861-0440<br>

                                <hr>

                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="telefone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="mensagem" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        <footer class="container-fluid py-3 rodape">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4">
                        <h5>Celke</h5>
                        <ul class="list-unstyled">
                            <li><a class="link-rodape" href="index.html">Home</a></li>
                            <li><a class="link-rodape" href="categorias.html">Categorias</a></li>
                            <li><a class="link-rodape" href="promocoes.html">Promoções</a></li>
                            <li><a class="link-rodape" href="contato.html">Contato</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4">
                        <h5>Contato</h5>
                        <ul class="list-unstyled">
                            <li><a class="link-rodape" href="tel:XXXXXXXXXX">(XX) XXXX-XXXX</a></li>
                            <li><a class="link-rodape" href="#">Av. Republica Argentina</a></li>
                            <li>CNPJ: XX.XXX.XXX/XXXX-XX</li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4">
                        <h5>Redes Sociais</h5>
                        <ul class="list-unstyled">
                            <li><a class="link-rodape" href="https://www.instagram.com/celkecursos" target="_blank">Instagram</a></li>
                            <li><a class="link-rodape" href="https://www.facebook.com/celkecursos/" target="_blank">Facebook</a></li>
                            <li><a class="link-rodape" href="https://www.youtube.com/channel/UC5ClMRHFl8o_MAaO4w7ZYug" target="_blank">YouTube</a></li>
                            <li><a class="link-rodape" href="https://twitter.com/celkecursos" target="_blank">Twiter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>