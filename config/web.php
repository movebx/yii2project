<?php

$params = require(__DIR__ . '/params.php');
$components = require(__DIR__.'/components.php');

$config = [
    'id' => 'portfolio',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'charset' => 'UTF-8',
    'name' => '',
    'layout' => 'basic',
    'components' => $components,
    'defaultRoute' => 'default/index',
    'modules' => [
        'admin' => 'app\modules\admin\AdminModule',

    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
