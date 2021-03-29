<footer class="container-fluid py-3 rodape">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
                <h5>Fantoni</h5>
                <ul class="list-unstyled">
                    <li>
                        <?= $this->Html->link(
                            __('Home'),
                            ['controller' => 'Home', 'action' => 'index'],
                            ['class' => 'link-rodape']
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            __('Categorias'),
                            ['controller' => 'Categorias', 'action' => 'index'],
                            ['class' => 'link-rodape']
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            __('Promoções'),
                            ['controller' => 'Promocoes', 'action' => 'index'],
                            ['class' => 'link-rodape']
                        ) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            __('Contato'),
                            ['controller' => 'Contato', 'action' => 'index'],
                            ['class' => 'link-rodape']
                        ) ?>
                    </li>
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