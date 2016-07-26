<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

if (!$config_local = @include __DIR__ . '/../config/web-local.php') {
    $config_local = [];
}

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/web.php'),
    $config_local
);

(new yii\web\Application($config))->run();
