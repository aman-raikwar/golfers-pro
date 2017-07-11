<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GolferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Golfer Cards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row top-row">
            <div class="col-12">
                <div class="portlet">
                    <div class="portlet-heading bg-inverse">
                        <h3 class="portlet-title"><?= $this->title ?></h3>
                        <div class="portlet-widgets">
                            <?= Html::a('<i class="fa fa-asl-interpreting"></i> Assign Cards', 'javascript:void(0);', ['class' => 'link-golfer', 'data-href' => Url::to(['golfer/create'])]) ?>
                            <?= Html::a('<i class="mdi mdi-plus"></i> Add New Cards', 'javascript:void(0);', ['class' => 'link-registration-cards', 'data-href' => Url::to(['registration-cards/create'])]) ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>                        
                    <div id="bg-default" class="panel-collapse collapse in show">
                        <div class="portlet-body">                            
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'tableOptions' => ['class' => 'table  table-bordered table-hover'],
                                'layout' => '{items}{summary}{pager}',
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 20px;', 'class' => 'text-center'],],
                                    'CardNumber',
                                    'ClubID',
                                    [
                                        'attribute' => 'UserID',
                                        'label' => 'First Name',
                                    ],
                                    [
                                        'attribute' => 'UserID',
                                        'label' => 'Last Name',
                                    ],
                                    'RegisteredDate',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Actions',
                                        'headerOptions' => ['style' => 'width:160px', 'class' => 'text-center'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'template' => '{view} {update} {delete}',
                                        'buttons' => [
                                            'view' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-search"></span>', $url, [
                                                            'title' => Yii::t('app', 'View the Golfer Profile'),
                                                            'class' => 'btn btn-icon waves-effect waves-light btn-danger'
                                                ]);
                                            },
                                            'update' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-pencil"></span>', 'javascript:void(0);', [
                                                            'title' => Yii::t('app', 'Edit the Golfer'),
                                                            'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golfer',
                                                            'data-href' => $url
                                                ]);
                                            },
                                            'delete' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-remove"></span>', $url, [
                                                            'title' => Yii::t('app', 'Delete the Golfer'),
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

<?php
Modal::begin(['id' => 'registration-cards-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>