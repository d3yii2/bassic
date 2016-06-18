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

$this->title = Yii::t('app', 'TestContacts') . $model->id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TestContacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="giiant-crud test-contacts-update">

    <h1>
        <?= Yii::t('app', 'TestContacts') ?>
        <small>
                        <?= $model->id ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
        'model' => $model,
        'relAttributes' => $relAttributes,
    ]); ?>

</div>
