<?php

$params = require(__DIR__ . '/params-local.php');

return [
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        // 'cache' => [
        //     'class' => yii\caching\FileCache::class,
        // ],
        'authManager'  => [
            'class' => yii\rbac\DbManager::class
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'redis' => [
            'class' => yii\redis\Connection::class,
            'database' => 0,
        ],
    ],
];
