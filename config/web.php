<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'd3files' => [
            'class'              => 'd3yii2\d3files\D3Files',
            'uploadDir'          => dirname(__DIR__) . '\upload\d3files',
            'disableController'  => false,
            'hashSalt'           => false, // Set salt in your web-local.php config, empty value will disable sharing
            'sharedExpireDays'   => 5,
            'sharedLeftLoadings' => 5,
            //'imageExtensions'    => [],
        ],
        'D3Pop3' => [
            'class' => 'd3yii2\d3pop3\d3pop3',
            'pop3boxes' => [
                [
                    'model' => 'test',
                    'record_id' => 77,
                    'host' => 'pop.gmail.com',
                    'user' => 'd3yii2d3pop3@gmail.com',
                    'password' => '2uvsKCrDU7MkXQKPxkXs',
                    'ssl' => 'SSL',
                    
                ],
            ],
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd-m-Y',
                'time' => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d',
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'z_vkKcWdotYQIVEa72c1wFuPKlfgUMj0',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
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
        'db' => require(__DIR__ . '/db.php'),
        'i18n' => [
            'translations' => [
                'd3files*' => [
                    'class'            => 'yii\i18n\PhpMessageSource',
                    'basePath'         => '@vendor/d3yii2/d3files/messages',
                    'forceTranslation' => true
                ],
            ],
        ],
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'kartikgii-crud' => [
                'class' => 'warrence\kartikgii\crud\Generator'
            ],
        ]
    ];
}

return $config;
