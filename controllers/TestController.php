<?php

namespace app\controllers;

/**
* This is the class for controller "TestController".
*/
class TestController extends \app\controllers\base\TestController
{

    public function actions()
    {
        return [
            'd3filesdownload' => 'd3yii2\d3files\components\DownloadAction',
            'd3filesupload'   => [
                'class'     => 'd3yii2\d3files\components\UploadAction',
                'modelName' => 'app\models\Test',
            ],
            'd3filesdelete'   => 'd3yii2\d3files\components\DeleteAction',
        ];
    }
}
