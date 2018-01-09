<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'VB',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => getenv('YII_COOKIE_VALIDATION_KEY'),
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<_c>' => '<_c>/index',
                '<_c>/<id:(\d+)>' => '<_c>/view',
                '<_c>/<_a>/<id:(\d+)>' => '<_c>/<_a>',
            ],
        ],
    ],
    'params' => $params,
];

$envConfig = __DIR__ . '/' . YII_ENV . '/web.php';

return \yii\helpers\ArrayHelper::merge(
    $config,
    file_exists($envConfig) ? require($envConfig) : []
);
