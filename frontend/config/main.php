<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'planetaverde-app-frontend',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/page',
    'modules' => [
        'user' => [
            'class' => 'frontend\modules\user\UserModule',
        ],
        'customTrip' => [
            'class' => 'frontend\modules\customTrip\CustomTripModule',
        ],
    ],
    'components' => [
        'request' => [
            'enableCsrfValidation'=>false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'site' => 'site/page',
                'signup' => 'site/signup',
                'logout' => 'site/logout',
                'login' => 'site/login',
                
                'user-profile/<action>'=>'/user/user-profile/<action>',
                'user-budgets/<action>'=>'/user/user-budgets/<action>',
                'user-planned-trips/<action>'=>'/user/user-planned-trips/<action>',
                'user-finished-trips/<action>'=>'/user/user-finished-trips/<action>',
                'user-messages/<action>'=>'/user/user-messages/<action>',
                'user-planned-trips/<action>'=>'/user/user-planned-trips/<action>',
                'user-friends/<action>'=>'/user/user-friends/<action>',
                'user-my-pictures/<action>'=>'/user/user-my-pictures/<action>',
                
                'Wishlist'=>'customTrip/wishlist/index',
                'configurator'=>'customTrip/custom-trip/index',
                'configurator/addExtension'=>'customTrip/custom-trip/add-extension',
                
                'Destinations' => 'destinations/index',
                'Destinations/<area_name:[\w\/.-]+( \w+)*$>' => 'destinations/index',
                '<itemGrandParent>/<itemParent>/<itemTitle>' => 'site/page',
                '<itemParent>/<itemTitle>' => 'site/page',
                '<itemTitle>' => 'site/page',
            ],
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
            'errorAction' => 'site/customerror',
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
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
                'trips*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'trips' => 'trips.php',
                        //'app/error' => 'error.php',
                    ],
                ], 
            ],
        ],
    ],
    'params' => $params,
];
