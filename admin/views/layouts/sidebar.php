<?php

$user = Yii::$app->user->getIdentity();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminJAM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'РАЗДЕЛ ПОЛЗОВАТЕЛЕЙ',
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/user/profile']],
                            ['label' => 'Верификация', 'icon' => 'people-outline', 'url' => ['/user/verification']],
                        ]
                    ],
                    [
                        'label' => 'РАЗДЕЛ МАГАЗИНА',
                        'items' => [
                            [
                                'label' => 'Магазин',
                                'iconStyle' => 'fa fa-shopping-cart',
                                'items' => [
                                    ['label' => 'Товары', 'iconStyle' => 'far', 'url' => ['/shop/product']],
                                    ['label' => 'Каталоги', 'iconStyle' => 'far', 'url' => ['/shop/catalog']],
                                    ['label' => 'Настройки', 'iconStyle' => 'far']
                                ]
                            ],
                            ['label' => 'Заказы', 'iconStyle' => 'far', 'url' => ['/order/order']],
                            ['label' => 'Склады', 'iconStyle' => 'far', 'url' => ['/warehouse/warehouse']],
                            ['label' => 'Накладные', 'iconStyle' => 'far', 'url' => ['/invoice/invoice']],
                            ['label' => 'Товарооборот', 'iconStyle' => 'far'],
                            [
                                'label' => 'Отчет',
                                'icon' => 'bag-handle-outline',
                                'items' => [
                                    ['label' => 'Отчет МКЦ', 'iconStyle' => 'far'],
                                    ['label' => 'Ежемесячный отчет', 'iconStyle' => 'far'],
                                    ['label' => 'Еженедельный отчет', 'iconStyle' => 'far']
                                ]
                            ],
                            ['label' => 'Билеты', 'iconStyle' => 'far', 'url' => ['/lottery/ticket']],
                            ['label' => 'Управление акциями', 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'РАЗДЕЛ ФИНАНСОВ',
                        'items' => [
//                            ['label' => 'Реверс операции', 'iconStyle' => 'far'],
//                            ['label' => 'Подтвердить операцию', 'iconStyle' => 'far'],
//                            ['label' => 'Отклонить операцию', 'iconStyle' => 'far'],
                            ['label' => 'Прошедшей операции', 'iconStyle' => 'far', 'url' => ['/finance/transaction']],
                            [
                                'label' => 'Кошельки',
                                'icon' => 'shop',
                                'items' => [
                                    ['label' => 'Пользователей', 'iconStyle' => 'far', 'url' => ['/wallet/wallet-user']],
                                    ['label' => 'Компании', 'iconStyle' => 'far', 'url' => ['/wallet/wallet-company']],
//                                    ['label' => 'Внутренние', 'iconStyle' => 'far']
                                ]
                            ],
                            ['label' => 'Выгрузка кешфлоу'],
                            ['label' => 'Отчеты компании'],
                        ]
                    ],
//                    [
//                        'label' => 'Starter Pages',
//                        'icon' => 'tachometer-alt',
//                        'badge' => '<span class="right badge badge-info">2</span>',
//                        'items' => [
//                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
//                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
//                        ]
//                    ],
//                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'АДМИНИСТРИРОВАНИЕ', 'header' => true],
                    [
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'icon' => 'sign-in-alt',
                        'visible' => Yii::$app->user->isGuest
                    ],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
//                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
//                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
//                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>