<nav class="sidebar">
    <ul class="list-unstyled">
        <li> <?= $this->Html->link(
                    '<i class="fas fa-tachometer-alt"></i> Dashboard',
                    [
                        'controller' => 'welcome',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ); ?>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-users"></i> Usuários',
                [
                    'controller' => 'Users',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>

        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-sliders-h"></i> Carousel',
                [
                    'controller' => 'Carousels',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>

        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-paste"></i> Categoria Anúncio',
                [
                    'controller' => 'CatsAnuncios',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>

        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-clipboard"></i> Anúncio',
                [
                    'controller' => 'Anuncios',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>

        </li>

        <li>
            <?= $this->Html->link(
                '<i class="far fa-check-square"></i> Situação do Anúncio',
                [
                    'controller' => 'AnunciosSituations',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>
        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-search"></i> Buscadores',
                [
                    'controller' => 'Robots',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>
        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-ad"></i> Anunciantes',
                [
                    'controller' => 'Anunciants',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>
        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-ad"></i> Info do Anunciante',
                [
                    'controller' => 'Anunciants',
                    'action' => 'viewAnunciante'
                ],
                [
                    'escape' => false
                ]
            ); ?>
        </li>

        <li>
            <?= $this->Html->link(
                '<i class="far fa-comments"></i> Mensagem do Anúncio',
                [
                    'controller' => 'ContatosAnunciants',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]
            ); ?>
        </li>

        <li>
            <?= $this->Html->link(
                '<i class="fas fa-sign-out-alt"></i> Sair',
                [
                    'controller' => 'users',
                    'action' => 'logout'
                ],
                [
                    'escape' => false
                ]
            ); ?>

        </li>
    </ul>
</nav>