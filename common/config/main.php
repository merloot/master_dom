<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db'    =>  require(__DIR__ . '/db.php'),
        'old_db'    =>  require(__DIR__ . '/old_db.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
