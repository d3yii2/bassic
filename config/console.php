<?php
$basePath = dirname(__DIR__);

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'migrate' => 'dmstr\console\controllers\MigrateController',
        'd3pop3' => 'd3yii2\d3pop3\command\D3Pop3Controller'
    ],
    'modules' => [
        'd3files' => [
            'class'     => 'd3yii2\d3files\D3Files',
            'uploadDir' => $basePath . '/upload/d3files',
        ],        
        'D3Pop3' => [
            'class' => 'd3yii2\d3pop3\d3pop3',
            'ConfigEmailContainerData' => [
                [
                    'model' => 'app\models\test',
                    'host' => 'pop.gmail.com',
                    'user' => 'd3yii2d3pop3@gmail.com',
                    'password' => '2uvsKCrDU7MkXQKPxkXs',
                    'ssl' => 'SSL',
                ],
            ],
            'EmailContainers' => [
                'd3yii2\d3pop3\components\ConfigEmailContainer',
            ]
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => 5,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => $basePath . '/runtime/logs/console.log',
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    'aliases' => [
        '@d3yii2' => '@vendor/d3yii2',
    ],
        /*
          'controllerMap' => [
          'fixture' => [ // Fixture generation command line.
          'class' => 'yii\faker\FixtureController',
          ],
          ],
         */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
