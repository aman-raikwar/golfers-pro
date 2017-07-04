<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Roles');
?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row top-row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title"><?= Html::encode($this->title) ?></h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-plus"></i>', 'javascript:void(0);', ['class' => 'link-role', 'data-href' => Url::to(['roles/create'])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>                        
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'tableOptions' => ['class' => 'table  table-bordered table-hover'],
                                    'layout' => '{items}{summary}{pager}',
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 20px;', 'class' => 'text-center'],],
                                        //'role_id',
                                        'role_name',
                                        ['attribute' => 'created_at', 'filter' => ''],
                                        ['attribute' => 'updated_at', 'filter' => ''],
                                        [
                                            'attribute' => 'status',
                                            'filter' => array("1" => "Active", "0" => "Inactive"),
                                            'content' => function($data) {
                                                return $data->status === 1 ? 'Active' : 'In-active';
                                            }
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => 'Actions',
                                            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-edit"></span>', 'javascript:void(0);', [
                                                                'title' => Yii::t('app', 'Edit'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-warning link-role',
                                                                'data-href' => $url
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-remove"></span>', $url, [
                                                                'title' => Yii::t('app', 'Delete'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-inverse',
                                                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                                'data-method' => 'post',
                                                    ]);
                                                }
                                            ]
                                        ]
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin(['id' => 'role-modal']);
Modal::end();
?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/roles-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>