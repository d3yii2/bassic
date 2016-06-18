<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\TestContacts $model
* @var string $relAttributes relation fields names for disabling
*/
if(!isset($relAttributes)){
    $relAttributes = false;
}

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TestContacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud test-contacts-create">

    <h1>
        <?= Yii::t('app', 'TestContacts') ?>        <small>
                        <?= $model->id ?>        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            Yii::t('app', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
        'model' => $model,
        'relAttributes' => $relAttributes,
    ]); ?>

</div>
