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
            'class'      => 'd3yii2\d3files\D3Files',
            'upload_dir' => $basePath . '/upload/d3files',
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
//                [
//                    'model' => 'test',
//                    'record_id' => 77,
//                    'host' => 'mail.itc.neonet.lv',
//                    'user' => 'rctedi@kls.lv',
//                    'password' => '51f7cbXt1',
//                    'ssl' => false,
//                ],
            ],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
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
