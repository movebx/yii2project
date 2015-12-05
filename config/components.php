<?php

$routes = require(__DIR__.'/routes.php');

return [
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'enableStrictParsing' => false,
        'rules' => $routes,
    ],

    'assetManager' => [
            'assetMap' => [
                'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'
            ]
    ],

    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => '6EZuD8mK_KS4ZMfpjhpctiyaBEKwdyFB',
        'baseUrl' => '',
    ],

    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],

    'user' => [
        'identityClass' => 'app\identity\User',
        'enableAutoLogin' => true,
    ],

    'errorHandler' => [
        'errorAction' => 'default/error',
    ],

    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],

    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],

    'db' => require(__DIR__ . '/db.php'),
];