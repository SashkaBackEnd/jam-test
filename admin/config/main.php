<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-admin',
    'name' => 'Interface manager - JamMarket',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'timeZone' => 'UTC',
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => [
        'log',
    ],
    'modules' => [
        'finance' => ['class' => admin\modules\finance\Module::class],
        'lottery' => ['class' => admin\modules\lottery\Module::class],
        'invoice' => ['class' => admin\modules\invoice\Module::class],
        'order' => ['class' => admin\modules\order\Module::class],
        'shop' => ['class' => admin\modules\shop\Module::class],
        'user' => ['class' => admin\modules\user\Module::class],
        'wallet' => ['class' => admin\modules\wallet\Module::class],
        'warehouse' => ['class' => admin\modules\warehouse\Module::class],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-admin',
        ],
        'user' => [
            'identityClass' => admin\models\User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-admin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the admin
            'name' => 'advanced-admin',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd H:i:s',
            'nullDisplay' => '-',
            'locale' => 'en-US',
            'thousandSeparator' => ' ',
            'decimalSeparator' => '.',
            'currencyCode' => 'EUR',
        ],
        'urlManager' => include_once __DIR__ . '/_urlManager.php',
    ],
    'params' => $params,
];
