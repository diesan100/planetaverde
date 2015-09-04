<?php
return [
    'language' => 'es',
    'timeZone' => 'Europe/Madrid',
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
        'redactor' => 'yii\redactor\RedactorModule',
        
         'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/uploads',
            'uploadUrl' => 'http://localhost/planetaverde/backend/web/uploads/',
        ],
        
        
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            //'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    
    
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
            'fileTransportPath' => "C://mail"
        ],
        'errorHandler'=>array(
            'errorAction' => 'site/error'
        ),
        'log' => [
                'flushInterval' => 1,
            'targets' => [
                [
                    'logFile' => '@runtime/logs/planetaverde.log',
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['error', 'warning', 'info' , 'trace'],
                ]/*,
                [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'categories' => ['yii\db\*'],
                    'message' => [
                       'from' => ['log@example.com'],
                       'to' => ['admin@example.com', 'developer@example.com'],
                       'subject' => 'Database errors at example.com',
                    ],
                ],*/
            ],
        ],
        
        
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                        'backend' => 'backend.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        
        
    ],
    'params' => [
        'paypal_sandbox' => true,
    ],
];
