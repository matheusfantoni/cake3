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