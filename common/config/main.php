<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'common\db\Connection',

            'schemaMap' => [
                'mysql' => 'common\db\mysql\Schema',
            ],

            'tablePrefixes' => [
                '%session' => '__web__',
                '%migration' => '__db__',

                '%auth_assignment' => '__rbac__',
                '%auth_item' => '__rbac__',
                '%auth_item_child' => '__rbac__',
                '%auth_rule' => '__rbac__',

                '%user' => '__user__',
                '%profile' => '__user__',
                '%token' => '__user__',
                '%social_account' => '__user__',
            ],
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['user'],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'formatter' => [
            'dateFormat' => 'php:m-d-Y',
            'datetimeFormat' => 'php:m-d-Y H:i',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@common/modules/yii2-user/views',
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'enableRegistration' => false,
            'enableConfirmation' => false,
            'enablePasswordRecovery' => false,
            'enableFlashMessages' => false,   // for advanced template, it already shows flash messages
            'confirmWithin' => 6 * 3600,
            'admins' => ['admin'],

            // http://site.local/user/admin
            // all users from 'admins' section have access here
        ],
    ],
];
