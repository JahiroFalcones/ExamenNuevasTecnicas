<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
            'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    ],
    'modules' => [
'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
    'enableRegistration'=>true,
        //'admins' => ['admin','marc'],
    ],
    'rbac' => [
        'class' => 'dektrium\rbac\Module',
    ],
],
];
