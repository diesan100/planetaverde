<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'planetaverde-app-backend',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        /*
        'cms_panel' => [
            'class' => 'app\modules\cms_panel\CmsPanelModule',
        ],*/
        'cms' => [
            'class' => 'common\modules\cms\CmsModule',
        ],
        'media' => [
            'class' => 'common\modules\media\MediaManagerModule',
        ],
        'users' => [
            'class' => 'app\modules\users\UsersModule',
        ],
        'billing' => [
            'class' => 'app\modules\billing\BillingModule',
        ],
        'dashboard' => [
            'class' => 'app\modules\dashboard\DashboardModule',
        ],
        'settings' => [
            'class' => 'backend\modules\settings\SettingsModule',
        ],
        'destinations' => [
            'class' => 'app\modules\destinations\DestinationsModule',
        ],
        'trips' => [
            'class' => 'app\modules\settings\TripsModule',
        ],
    ],
    'components' => [
        'formatter' => [
            'dateFormat' => 'dd/MM/yyyy',
            'datetimeFormat' => 'd/M/Y H:i:s',
            'decimalSeparator' => ',',
            //'thousandSeparator' => ' ',
            //'currencyCode' => 'EUR',
       ],
        'request' => [
            'enableCsrfValidation'=>false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendUser', // unique for frontend
                'path'=>'/planetaverde/backend/web/'  // correct path for the frontend app.
            ]
        ],
        'session' => [
            'name' => 'PHPBACKENDSESSID',
            'savePath' => __DIR__ . '/../tmp',
            'cookieParams' => [
                'path'=>'/planetaverde/backend/web/'  //
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
               //'site' => 'site/page',
               //'signup' => 'site/signup',
               //'logout' => 'site/logout',
               //'login' => 'site/login',
               //'<itemParent>/<itemTitle>' => 'site/page',
               //'<itemTitle>' => 'site/page',
               //'site/page' => 'site/page',
            ],
            
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
        'i18n' => [
            'translations' => [
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'backend' => 'backend.php',
                        //'app/error' => 'error.php',
                    ],
                ],   
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                        //'app/error' => 'error.php',
                    ],
                ], 
            ],
        ],
    ],
    'params' => $params,
];
