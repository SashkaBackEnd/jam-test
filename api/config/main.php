<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-cabinet',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'UTC',
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'aliases' => [
        '@api' => dirname(dirname(__DIR__)) . '/api',
    ],
    'modules' => [
        'rest' => ['class' => api\modules\rest\Module::class],
        'graphql' => ['class' => api\modules\graphql\Module::class],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ],
            'enableCsrfCookie' => false,
            'enableCsrfValidation' => false,
            'csrfParam' => '_csrf-api',
            'enableCookieValidation' => false,
            'cookieValidationKey' => 'f8c3a92e-e98f-4b58-9839-10ca7d9a3f42',
        ],
        'response' => [
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // используем "pretty" в режиме отладки
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],
        'user' => [
            'identityClass' => api\models\User::class,
            'enableSession' => false,
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 0 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => include __DIR__ . '/_routes.php',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
    ],
    'params' => $params,
];
