<?php
return [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('OLD_DB_DSN'),
            'username' => getenv('OLD_DB_USERNAME'),
            'password' => getenv('OLD_DB_PASSWORD'),
            'charset' => 'utf8',
];