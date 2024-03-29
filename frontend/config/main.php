<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'modules' => [
        'gii'=> [
            'class' => 'yii\gii\Module',
        ],
        'doors' => [
            'class' => 'frontend\modules\doors\Module',
        ],
    ],

    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'db'    =>  require(__DIR__ . '/../../common/config/db.php'),
        'old_db'    =>  require(__DIR__ . '/../../common/config/old_db.php'),
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'doors/one/<id>'            => 'doors/one',
                'doors/order/<id>'          => 'doors/order',
                'doors/one-old/<id>'        => 'doors/one-old',
                'doors/all'                 => 'doors/default/all',
                'doors/index'               => 'doors/default/index',
                'doors/create'              => 'doors/default/create',
                'doors/update/<id>'         => 'doors/default/update',
                'doors/storage'             => 'doors/default/storage',
                'doors/all-old'             => 'doors/default/all-old',
                'doors/count-doors'         => 'doors/default/count-doors',
                'doors/order-update/<id>'   => 'doors/default/order-update',
            ],
        ],

    ],

    'params' => $params,
];
