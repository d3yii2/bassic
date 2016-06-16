<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use kartik\editable\Editable;

/**
* @var yii\web\View $this
* @var app\models\TestContacts $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'TestContacts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TestContacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud test-contacts-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'TestContacts') ?>        <small>
            <?= $model->id ?>        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'),
            [ 'update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Copy'),
            ['create', 'id' => $model->id, 'TestContacts'=>$copyParams],
            ['class' => 'btn btn-success']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'),
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . Yii::t('app', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('app\models\TestContacts'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
                [
                'attribute'=>'id',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'id',
                    'asPopover' => true,
                    'value' => $model->id,
                    'header' => $model->getAttributeLabel('id'),
                    'inputType' => Editable::INPUT_TEXT,
                    'size' => 'md',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter ...'
                    ],
                    'ajaxSettings' => [
                        'url' => Url::to(['editable', 'id' => $model->primaryKey]),
                    ],
                ]),
                
            ],
            [
                'attribute'=>'test_id',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'test_id',
                    'asPopover' => true,
                    'value' => $model->test_id,
                    'header' => $model->getAttributeLabel('test_id'),
                    'inputType' => Editable::INPUT_TEXT,
                    'size' => 'md',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter ...'
                    ],
                    'ajaxSettings' => [
                        'url' => Url::to(['editable', 'id' => $model->primaryKey]),
                    ],
                ]),
                
            ],
            [
                'attribute'=>'phone',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'phone',
                    'asPopover' => true,
                    'value' => $model->phone,
                    'header' => $model->getAttributeLabel('phone'),
                    'inputType' => Editable::INPUT_TEXT,
                    'size' => 'md',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter ...'
                    ],
                    'ajaxSettings' => [
                        'url' => Url::to(['editable', 'id' => $model->primaryKey]),
                    ],
                ]),
                
            ],
            [
                'attribute'=>'email',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'email',
                    'asPopover' => true,
                    'value' => $model->email,
                    'header' => $model->getAttributeLabel('email'),
                    'inputType' => Editable::INPUT_TEXT,
                    'size' => 'md',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter ...'
                    ],
                    'ajaxSettings' => [
                        'url' => Url::to(['editable', 'id' => $model->primaryKey]),
                    ],
                ]),
                
            ],
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['app\models\TestContacts'],
    'active'  => true,
], ]
                 ]
    );
    ?>
</div>
