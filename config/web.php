<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-szKHwtdc71b4fAzRlUN1s37bUeouYKI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'security' => [
            'class' => 'yii\base\Security',
        ],
        'encrypter' => [
            'class' => 'app\components\security\Encrypter',
        ],
        'post' => [
            'class' => 'app\components\html\Post',
        ],
        'htmlHelper' => [
            'class' => 'app\components\html\Helper',
        ],
        'user' => [
            'identityClass' => 'app\models\Users\ActiveRecord\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/admin/auth/index'
        ],
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<folder:\w+>/<controller:\w+>/<action:\w+>' => '<folder>/<controller>/<action>',
                '<folder:\w+>/<controller:\w+>/<action:\w+>/<id:[\-]?\w+>' => '<folder>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<slug:\d+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
    'language' => 'es-PE',
    'charset' => 'UTF-8',
    'sourceLanguage' => 'es-PE',
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
