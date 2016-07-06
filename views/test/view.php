<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use kartik\editable\Editable;
use kartik\grid\GridView;
use kartik\grid\EditableColumn;

/**
 * @var yii\web\View $this
 * @var app\models\Test $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud test-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'Test') ?>        <small>
            <?= $model->name ?>        </small>
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
            ['create', 'id' => $model->id, 'Test'=>$copyParams],
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

    <?php $this->beginBlock('app\models\Test'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
                [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'name',
                    'asPopover' => true,
                    'value' => $model->name,
                    'header' => $model->getAttributeLabel('name'),
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
                'attribute' => 'description',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'description',
                    'asPopover' => true,
                    'value' => $model->description,
                    'header' => $model->getAttributeLabel('description'),
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
                'attribute' => 'createdate',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'createdate',
                    'asPopover' => true,
                    'value' => $model->createdate,
                    'header' => $model->getAttributeLabel('createdate'),
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
                'attribute' => 'update_dt',
                'format' => 'raw',
                'value' => Editable::widget([
                    'name' => 'update_dt',
                    'asPopover' => true,
                    'value' => $model->update_dt,
                    'header' => $model->getAttributeLabel('update_dt'),
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


    
<?php $this->beginBlock('TestContacts'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Test Contacts',
            ['test-contacts/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'),
            ['test-contacts/create', 'TestContacts' => ['test_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'Add row'),
            ['test-contacts/create-for-rel', 'TestContacts' => ['test_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-TestContacts', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-TestContacts ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
    <div class="table-responsive">
        <?= GridView::widget([
//    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getTestContacts(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-testcontacts']]),
//    'pager'        => [
//        'class'          => yii\widgets\LinkPager::className(),
//        'firstPageLabel' => Yii::t('app', 'First'),
//        'lastPageLabel'  => Yii::t('app', 'Last')
//    ],
    'columns' => [
        [
            'class' => '\kartik\grid\EditableColumn',
            'attribute' => 'phone',
            'editableOptions' => [
                'formOptions' => [
                    'action' => [
                        'test-contacts/editable-column-update'
                    ]
                ]
            ]
        ],

        [
            'class' => '\kartik\grid\EditableColumn',
            'attribute' => 'email',
            'editableOptions' => [
                'formOptions' => [
                    'action' => [
                        'test-contacts/editable-column-update'
                    ]
                ]
            ]
        ],
  
        [
            'class' => '\kartik\grid\ActionColumn',
            'urlCreator' =>  
                function($action, $model, $key, $index) {
                    $params = is_array($key) ? $key : ['id' => (string) $key];
                    $params[0] = 'test-contacts/' . $action;
                    $params['TestContacts'] = ['test_id' => $model->id];
                    return Url::toRoute($params);            
                },
        ]            
                 ]
])?>
    </div>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>

    <div class="row">
        <div class="col-md-4">
            <?=$this->blocks['app\models\Test']?>
        </div>
        <div class="col-md-8">
            <h2>Test Contacts</h2>
            <?=$this->blocks['TestContacts']?>
        </div>
    </div>    
</div>
